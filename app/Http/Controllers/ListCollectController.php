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
        // $var = Collect::with('partner', 'partner.villeFrance', 'article')->where('statut', 0)->get();
        // foreach ($var as $v) {
        //     //dd($v);  ->pivot->quantity
        //     foreach ($v->article as $s) {
        //         foreach ($s->color as $c) {
        //             dd($c->pivot->quantity);
        //         }
        //     }
        // }
        // foreach ($var as $v) { }
        return view('list-collect.index');
    }
    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        $collects = Collect::with('partner', 'partner.villeFrance', 'article')->where('statut', 0)->get();
        foreach ($collects as $collect) {
            $qty = 0;
            foreach ($collect->article as $article) {
                foreach ($article->color as $color) {
                    $qty += $color->pivot->quantity;
                }
            }
            $collect->quantity = $qty;
        }
        //select i, case i when 1 then 'active' else 'inactive' end ANSWER from ints where i=1;
        return Datatables::of($collects)->make(true);
    }
}
