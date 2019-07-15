<?php

namespace App\Http\Controllers;

use App\Model\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(request $request){
        $id = $request->id;
        $article = Article::find($id);

        $articles['name'] = $article->name;
        $articles['category'] = $article->category->name;
        $articles['gender'] = $article->gender->name;

        foreach ($article->associationArticle as $assoc) {
            $articles['declinations'][$assoc->color->color][$assoc->size->size] = $assoc->stock;
        }

//        dd($articles);
        return view('article.index')->with('articles', $articles);
    }
}
