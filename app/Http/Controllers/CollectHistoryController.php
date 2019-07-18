<?php

namespace App\Http\Controllers;

use App\Model\Collect;
use Yajra\Datatables\Datatables;
use Auth;
use Illuminate\Http\Request;
use App\Traits\PdfPerso;

class CollectHistoryController extends Controller
{

    use PdfPerso;

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
            $collect->quantity_collected = $qty;
        }

        return Datatables::of($collects)->make(true);
    }

    public function pdfCollectHistory(Request $request)
    {

        $action = $request->action;
        $id = $request->collectId;
        $pdf = $this->pdfCollect($action, $id);
        return $pdf;
    }
}
