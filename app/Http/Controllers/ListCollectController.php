<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Collect;
use Yajra\Datatables\Datatables;

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
        $var = Collect::with('partner', 'partner.villeFrance')->get();
        //$var = $var->partner;

        //select i, case i when 1 then 'active' else 'inactive' end ANSWER from ints where i=1;
        return Datatables::of($var)->make(true);
    }
}
