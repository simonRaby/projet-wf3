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


Route::get('adminAddMember', 'AdminAddMemberController@index');
Route::post('adminAddMember', 'AdminAddMemberController@store');

Route::get('updateAdminMember','AdminAddMemberController@edit');
Route::post('updateAdminMember','AdminAddMemberController@update');

Route::get('AjaxDeleteAdminMember','AdminAddMemberController@delete');

Route::get('adminAddPartner','AdminAddPartnerController@index');
Route::post('adminAddPartner','AdminAddPartnerController@store');

Route::post('AjaxAdminAddPartner', 'AdminAddPartnerController@AjaxPostalCode');

