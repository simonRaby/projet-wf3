<?php

namespace App\Http\Controllers;

use App\Model\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class ListarticleController extends Controller
{
    public function index()
    {

        return view('list-article.index');
    }
    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        $x =0;
       $test=  DB::table('articles')->select('articles.id','articles.name AS a_name', 'categories.name AS c_name', 'genders.label As g_label',  'sizes.label AS s_label', 'marques.label AS m_label','ranks.label AS r_label','colors.label As c_label', 'articles.qrcode_img AS qr_code')
            ->leftJoin('associations_articles', 'articles.id', '=', 'associations_articles.article_id')
            ->leftJoin('colors', 'associations_articles.color_id', '=', 'colors.id')
            ->leftJoin('sizes', 'associations_articles.size_id', '=', 'sizes.id')
            ->leftJoin('categories', 'articles.category_id', '=', 'categories.id')
            ->leftJoin('genders', 'articles.gender_id', '=', 'genders.id')
            ->leftJoin('ranks', 'articles.rank_id', '=', 'ranks.id')
            ->leftJoin('marques', 'articles.marque_id', '=', 'marques.id')
            ->where('is_collected', true )->get();
//dd($test);
//       foreach($test as $article){
//
//           $product[$x]['name'] = $article->name;
////         $product[$x]['rank']= $article->rank_id->label;
//           $product[$x]['category']= $article->category_id;
//           $product[$x]['marque']= $article->marque_id;
//           $product[$x]['gender']= $article->gender_id;
//           $product[$x]['collect']= $article->collect_id;
//           $x++;
//       }
//
//
//        dd($test);
        return Datatables::of($test)->make(true);
    }
}
