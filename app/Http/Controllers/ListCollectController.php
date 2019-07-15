<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Collect;
use Yajra\Datatables\Datatables;
use App\Model\Article;

class ListCollectController extends Controller
{
    public function index()
    {

        return view('list-collect.index');
    }
    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        $collects = Collect::with('partner', 'partner.villeFrance', 'article')->where('status_id', 1)->get();
        foreach ($collects as $collect) {
            $qty = 0;
            foreach ($collect->article as $article) {
                foreach ($article->associationArticle as $assoc) {
                    $qty += $assoc->quantity;
                }
            }
            $collect->quantity = $qty;
        }
        return Datatables::of($collects)->make(true);
    }
}
