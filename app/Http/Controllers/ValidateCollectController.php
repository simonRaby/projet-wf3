<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Collect;
use App\Model\AssociationArticle;
use PDF;

class ValidateCollectController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->id;

        $collect = Collect::find($id)->article;
        $articles = [];
        $x = 0;

        foreach ($collect as $article) {
            foreach ($article->associationArticle as $assoc) {
                $articles[$x]['id'] = $assoc->id;
                $articles[$x]['name'] = $article->name;
                $articles[$x]['categorie'] = $article->category->name;
                $articles[$x]['gender'] = $article->gender->label;
                $articles[$x]['size'] = $assoc->size->label;
                $articles[$x]['color'] = $assoc->color->label;
                $articles[$x]['quantity'] = $assoc->quantity;
                $x++;
            }
        }

        return view('validate-collect.index')->with(['articles' => $articles, 'id' => $id]);
    }

    public function store(Request $request)
    {
        $rejected = $request->rejected;
        $quantity = $request->quantity;
        $collectId = $request->collectId;
        $date = now();
        $toBeBanned = array();
        $allRejected = true;
        $collectError = false;

        if ($rejected) {
            foreach ($rejected as $id => $value) {
                $association = AssociationArticle::find($id);
                $association->is_rejected = 1;
                //$association->save();

                $toBeBanned[] = $id;
            }
        }

        foreach ($request->quantityCollected as $id => $qtyCollected) {
            if (!in_array($id, $toBeBanned)) {
                $allRejected = false;
                $association = AssociationArticle::find($id);
                $association->stock = $qtyCollected;
                $association->is_collected = 1;
                if ($qtyCollected != $quantity[$id]) {
                    $collectError = true;
                    $association->quantity_collected = $qtyCollected;
                    $association->is_error = 1;
                }
                // $association->save();
            }
        }

        $collect = Collect::find($collectId);
        if (!$allRejected) {
            $collect->collected_at = $date;
            $collect->status_id = 2; //Change le status de la collect a collecté
        } else {
            $collectError = true;
            $collect->status_id = 3; //Change le status de la collect a rejeté
        }
        if ($collectError) {
            $collect->is_error = 1;
        }
        //$collect->save();
        $collectId = 2;
        session()->flash('successMessage',  'Collect validé');
        session()->flash('collectId', $collectId);


        //return $this->pdfCollect('download', $collectId);

        return redirect()->route('listCollect');
    }

    public function pdfCollect(Request $request)
    {
        $action = $request->action;
        $collectId = $request->collectId;

        $collect = Collect::find($collectId);
        $partner = $collect->partner;
        $articles = $collect->article;
        $collectPdf['collectedAt'] = $collect->collected_at;
        $collectPdf['partnerName'] = $partner->name;
        $collectPdf['partnerAdress'] = $partner->address;
        $collectPdf['partnerTel'] = $partner->tel;
        $collectPdf['partnerCp'] =  $partner->villeFrance->ville_code_postal;
        $collectPdf['partnerCity'] = $partner->villeFrance->ville_nom_reel;
        if ($collect->status_id == 2) {
            $collectPdf['articles'] = '';
        } elseif ($collect->status_id == 3) {
            $i = 1;
            foreach ($articles as $article) {
                foreach ($article->associationArticle as $assoc) {
                    $collectPdf['articles'][$i]['name'] = $article->name;
                    $collectPdf['articles'][$i]['category'] = $article->category->name;
                    $collectPdf['articles'][$i]['gender'] = $article->gender->label;
                    $collectPdf['articles'][$i]['size'] = $assoc->size->label;
                    $collectPdf['articles'][$i]['color'] = $assoc->color->label;
                    $collectPdf['articles'][$i]['quantity'] = $assoc->quantity;
                    $collectPdf['articles'][$i]['quantityCollected'] = $assoc->quantity_collected ?: 0;
                    $i++;
                }
            }
        }

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadView('layouts.pdf-collect', $collectPdf);

        switch ($action) {
            case 'save':
                return $pdf->save('collect.pdf');
                break;
            case 'stream':
                return $pdf->stream();
                break;
            case 'download':
                return $pdf->download('collect.pdf');
                break;
            default:
                return false;
                break;
        }
    }
}
