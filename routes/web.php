<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layout.master');
});

Route::get('listMember', 'ListMemberController@index');
Route::get('listPartner', 'ListPartnerController@index');

//Route temporaire pour la création du formulaire membre

Route::get('adminAddMember', function () {
    return view('adminAddMember.index');
});
Route::post('adminAddMember', 'AdminAddMemberController@store');

//Route temporaire pour la création du formulaire partenaire
Route::get('adminAddPartner', function () {
    return view('adminAddPartner.index');
});
Route::post('adminAddPartner','AdminAddPartnerController@store');


Route::post('AjaxAdminAddPartner', 'AdminAddPartnerController@Ajax');
Route::get('AjaxAdminAddPartner','AdminAddPartnerController@Ajax');
