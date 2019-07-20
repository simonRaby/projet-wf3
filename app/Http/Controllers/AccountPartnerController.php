<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use Auth;
use App\Model\Partner;

class AccountPartnerController extends Controller
{
    public function index()
    {

        $user = User::find(Auth::user()->id);

        return view('AccountPartner.index')->with('user', $user);
    }
}
