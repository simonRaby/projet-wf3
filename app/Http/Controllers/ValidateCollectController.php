<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Collect;
use App\Model\AssociationArticle;
use PDF;
use App\Traits\PdfPerso;

class ValidateCollectController extends Controller
{
    use PdfPerso;

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

        return view('validateCollect.index')->with(['articles' => $articles, 'id' => $id]);
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
                $association->save();

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
                $association->save();
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
        $collect->save();
        $collectId = 2;
        session()->flash('successMessage',  'Collect validé');
        session()->flash('collectId', $collectId);


        return redirect()->route('listCollect');
    }

    public function pdfBonCollect(Request $request)
    {
        $action = $request->action;
        $collectId = $request->collectId;

        $pdf = $this->pdfCollect($action, $collectId);
        return $pdf;
    }
}
