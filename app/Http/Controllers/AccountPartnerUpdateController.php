<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use Auth;
use App\Model\Partner;

class AccountPartnerUpdateController extends Controller
{
    public function index()
    {
        $user = Auth::User();
        $users = User::where('id',  $user->id)->first();

        $partner = Partner::where('id', $user->partner_id)->first();

        return view('accountPartnerUpdate.index')->with('users', $users)
            ->with('partner', $partner);
    }

    public function edit(Request $request)
    {
        $data = $request->all();

        $user = User::where('id', $data['userId'])->first();
        $partner = Partner::where('id', $user->partner_id)->first();

        $user->firstname     = $data['firstname'];
        $user->lastname     = $data['lastname'];
        $user->email         = $data['email'];
        $partner->name =  $data['name'];
        $partner->address = $data['adresse'];
        $partner->tel     = $data['tel'];
        $partner->siret   = $data['siret'];

        $user->save();
        $partner->save();

        return view('AccountPartner.index')->with('user', $user);
    }
}
