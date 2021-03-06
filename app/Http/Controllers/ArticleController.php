<?php

namespace App\Http\Controllers;

use App\Model\Article;
use App\Model\AssociationArticle;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(request $request)
    {
        $id = $request->id;
        $article = Article::find($id);

        $articles['id_product'] = $article->id;
        $articles['name'] = $article->name;
        $articles['category'] = $article->category->name;
        $articles['gender'] = $article->gender->label;
        $articles['rank'] = $article->rank->label;
        //$articles['img'] = $article->img;
        foreach ($article->associationArticle as $assoc) {
            if($assoc->is_collected){
                $articles['declinations'][$assoc->color->label][$assoc->size->label] = $assoc->stock;
                $articles['id'][$assoc->color->label][$assoc->size->label] = $assoc->id;
            }
        }


        return view('article.index')->with('articles', $articles);
    }

    public function Vendu(request $request)
    {




        foreach ($request->vendu as $key => $val) {
            if ($val != null) {

                $total[$key] = $val;
                $data = AssociationArticle::find($key);
                $stock = (int) $data['stock'] -  (int) $request->vendu[$key];
                $data->stock = $stock;
                $data->save();
            }
        }
        $id = $request->id_product;
        $article = Article::find($id);

        $articles['id_product'] = $article->id;
        $articles['name'] = $article->name;
        $articles['category'] = $article->category->name;
        $articles['gender'] = $article->gender->label;
        $articles['rank'] = $article->rank->label;
        //$articles['img'] =$articles->img;
        foreach ($article->associationArticle as $assoc) {
            $articles['declinations'][$assoc->color->label][$assoc->size->label] = $assoc->stock;
            $articles['id'][$assoc->color->label][$assoc->size->label] = $assoc->id;
        }



        return redirect()->route('article', ['id' => $id])->with('articles', $articles);
    }
}
