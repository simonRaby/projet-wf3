<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Article;
use App\Model\Collect;
use App\Model\Category;
use App\Model\Gender;
use App\Model\Marque;
use App\Model\Color;
use App\Model\Size;
use App\Model\AssociationArticle;
use Auth;
use QrCode;

class RecapCollectController extends Controller
{
    public function index(Request $request)
    {
        if ($request->session()->has('collect')) {
            $collect = $request->session()->get('collect');
            $i = 0;
            foreach ($collect as $article) {
                if (is_numeric($article['marque_id'])) {
                    $marque = Marque::find($article['marque_id']);
                    $collect[$i]['marque'] =  $marque->label;
                } else {
                    $collect[$i]['marque'] = $article['marque_id'];
                }
                $category = Category::find($article['category_id']);
                $collect[$i]['category'] = $category->name;
                $gender = Gender::find($article['gender_id']);
                $collect[$i]['gender'] = $gender->label;
                $j = 0;
                foreach ($article['declinations'] as $declination) {
                    $color = Color::find($declination['color_id']);
                    $collect[$i]['declinations'][$j]['color'] = $color->label;
                    $size = Size::find($declination['size_id']);
                    $collect[$i]['declinations'][$j]['size'] = $size->label;
                    $j++;
                }
                $i++;
            }
        } else {
            $collect = false;
        }

        return view('recapCollect.index')->with('collect', $collect);
    }

    public function cancel()
    {
        session()->forget('collect');

        return redirect('/addArticle');
    }

    public function store(Request $request)
    {

        if ($request->session()->has('collect')) {

            $collect = $request->session()->get('collect');
            $newCollect = new Collect;
            $newCollect->partner_id = Auth::user()->partner_id;
            $newCollect->status_id = 1;
            $newCollect->save();
            foreach ($collect as $article) {
                $newArticle = new Article;
                if (is_numeric($article['marque_id'])) {
                    $newArticle->marque_id = $article['marque_id'];
                } else {
                    $verifMarque = Marque::where('label', $article['marque_id'])->first();
                    if ($verifMarque) {
                        $newArticle->marque_id =  $verifMarque->id;
                    } else {
                        $newMarque = new Marque;
                        $newMarque->label = $article['marque_id'];
                        $newMarque->save();
                        $newArticle->marque_id =  $newMarque->id;
                    }
                }
                $newArticle->rank_id = 1;
                $newArticle->collect_id = $newCollect->id;
                $newArticle->name = $article['name'];
                $newArticle->category_id = $article['category_id'];
                $newArticle->gender_id = $article['gender_id'];

                //creation du qr code
                $qrName = uniqid('qr_');



                $newArticle->qrcode_img = $qrName . '.svg';
                $newArticle->save();

                QrCode::size(500)->generate('https://projet-wf3/article?id=' . $newArticle->id, 'storage/images/qr/' . $qrName . '.svg');

                foreach ($article['declinations'] as $declination) {
                    $newDeclination = new AssociationArticle;
                    $newDeclination->article_id = $newArticle->id;
                    $newDeclination->size_id = $declination['size_id'];
                    $newDeclination->color_id = $declination['color_id'];
                    $newDeclination->quantity = $declination['quantity'];
                    $newDeclination->save();
                }
            }

            $request->session()->forget('collect');
        }

        session()->flash('successMessage',  'Collecte Créé');

        return view('collectHistory.index');
    }
}
