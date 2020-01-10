<?php

namespace App\Http\Controllers;

use App\Model\User;
use Yajra\DataTables\DataTables;

class ListPartnerController extends Controller
{
    //
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('listPartner.index');
    }

    /**
     * Get partner data and return it for the view with Ajax datatable
     * @return mixed
     * @throws \Exception
     */
    public function listPartnerData()
    {
         $partnerDatas = User::with('partner','partner.villeFrance')->where('role_id','=', 3)->where('delete_at','=',NULL)->get();

        return Datatables::of($partnerDatas)->make(true);
    }

}
