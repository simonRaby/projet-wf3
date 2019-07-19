<?php

use Illuminate\Support\Facades\Route;

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
    return view('home.index');
});
Route::get('/scan', 'ScanController@index');

Auth::routes();
Auth::routes(['verify' => true]);
Auth::routes(['register' => false]);

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');

Route::get('/about', 'AboutController@index');

Route::get('/contact', 'ContactController@index');
Route::post('/contact', 'ContactController@store');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/list-collect-data', 'ListCollectController@anyData')->name('listcollectdata');
Route::get('/list-collect', 'ListCollectController@index');
Route::get('/validate-collect', 'ValidateCollectController@index');
Route::post('/validate-collect', 'ValidateCollectController@store');

Route::get('/scan', 'ScanController@index');

Route::get('/article', 'ArticleController@index');

Route::get('listMember', 'ListMemberController@index');
Route::get('listPartnerData', 'listPartnerController@listPartnerData')->name('listPartnerData');
Route::get('listPartner', 'ListPartnerController@index');

Route::get('adminAddMember', 'AdminAddMemberController@index');
Route::post('adminAddMember', 'AdminAddMemberController@store');

Route::get('updateAdminMember','AdminAddMemberController@edit');
Route::post('updateAdminMember','AdminAddMemberController@update');

Route::get('editAdminPartner','AdminAddPartnerController@edit');
Route::post('updateAdminPartner', 'AdminAddPartnerController@update');
Route::get('deleteAdminPartner', 'AdminAddPartnerController@delete');

Route::get('emailValidatePartner', function (){
    return view('auth.verify');
});


Route::get('adminAddPartner','AdminAddPartnerController@index');
Route::post('adminAddPartner','AdminAddPartnerController@store');

Route::post('AjaxAdminAddPartner', 'AdminAddPartnerController@ajaxPostalCode');
Route::get('AjaxDeleteAdminMember','AdminAddMemberController@ajaxDeleteAdminMember');
