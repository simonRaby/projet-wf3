<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Collect;

class ValidateCollectController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->id;

        $articles = Collect::find($id)->article;
        $collect = [];
        $x = 0;

        foreach ($articles as $article) {
            //dd($article->category);

            // dd($article);

            foreach ($article->size as $size) {

                $collect[$x]['name'] = $article->name;
                $collect[$x]['categorie'] = $article->category->name;
                $collect[$x]['gender'] = $article->gender->name;
                $collect[$x]['size'] = $size->size;
                $collect[$x]['color'] = $size->color[0]->color;
                $collect[$x]['quantity'] = $size->pivot->quantity;
                $x++;
            }
        }

        return view('validate-collect.index')->with('articles', $collect);
    }
}
