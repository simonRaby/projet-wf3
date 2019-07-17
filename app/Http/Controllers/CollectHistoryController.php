<?php

namespace App\Http\Controllers;

use App\Model\Collect;
use Yajra\Datatables\Datatables;
use Auth;
use Illuminate\Http\Request;

class CollectHistoryController extends Controller
{
    public function index()
    {

        return view('collectHistory.index');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {

        $collects = Collect::with('status')->where('status_id', '!=', 1)->where('partner_id', '=', Auth::user()->partner_id)->get();
        foreach ($collects as $collect) {
            $qty = 0;
            foreach ($collect->article as $article) {
                foreach ($article->associationArticle as $assoc) {
                    $qty += $assoc->quantity_collected;
                }
            }
            // if ($collect->is_error) {
            //     $collect->error = '<i class="fas fa-check-circle"></i>';
            // } else {
            //     $collect->error =  '<i class="fas fa-check-circle"></i>';
            // }
            $collect->quantity_collected = $qty;
        }

        return Datatables::of($collects)->make(true);
    }
}
