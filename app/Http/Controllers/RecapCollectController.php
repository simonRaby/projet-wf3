<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Article;

class RecapCollectController extends Controller
{
    public function index(Request $request)
    {
        if ($request->session()->has('collect')) {
            $collect = $request->session()->get('collect');
        } else {
            $collect = false;
        }

        return view('recapCollect.index')->with('collect', $collect);
    }

    public function store(Request $request)
    {

        if ($request->session()->has('collect')) {
            $collect = $request->session()->get('collect');
            $newCollect = new Collect;
            $newCollect->partner_id = $collect['partner_id'];
            $newCollect->status_id = 0;
            $newCollectId = $newCollect->save();
            foreach ($collect['articles'] as $article) {
                $newArticle = new Article;
                $newArticle->collect_id = $newCollectId->id;
                $newArticle->name = $article['name'];
                $newArticle->category_id = $article['category_id'];
                $newArticle->marque_id = $article['marque_id'];
                $newArticle->gender_id = $article['gender_id'];
                $newArticleId = $newArticle->save();
                foreach ($article['declinations'] as $declination) {
                    $newDeclination = new AssociationArticle;
                    $newDeclination->article_id = $newArticleId['id'];
                    $newDeclination->size_id = $declination['size_id'];
                    $newDeclination->color_id = $declination['color_id'];
                    $newDeclination->quantity_id = $declination['quantity'];
                    $newDeclination->save();
                }
            }

            $request->session()->forget('collect');
        }

        return view('historyCollect.index');
    }
}
