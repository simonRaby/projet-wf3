<?php

namespace App\Http\Controllers;

use App\Model\User;
use phpDocumentor\Reflection\Types\Null_;


class ListMemberController extends Controller
{
    //
    /**
     * Get data member in database and return this
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $members = User::all()->where('role_id', '=', '2')->where('delete_at','=', NULL);
        return view('listMember.index')->with('members', $members);
    }
}
