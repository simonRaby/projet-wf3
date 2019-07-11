<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Collect;

class ValidateCollectController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->id;

        $var = Collect::find($id)->article;

        dd($var);
        return view('validate-collect.index');
    }
}
