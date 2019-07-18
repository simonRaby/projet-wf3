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
Auth::routes(['register' => false]);
Route::get('/about', 'AboutController@index');
Route::get('/contact', 'ContactController@index');
Route::post('/contact', 'ContactController@store');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/list-collect-data', 'ListCollectController@anyData')->name('listcollectdata');
Route::get('/validate-collect', 'ValidateCollectController@index');
Route::post('/validate-collect', 'ValidateCollectController@store');

Route::get('/article', 'ArticleController@index' )->name('article');
Route::post('/article', 'ArticleController@vendu' );

Route::get('/scan', 'ScanController@index');
Route::get('/article', 'ArticleController@index');


Route::get('/list-article', 'ListarticleController@index');
Route::get('/list-article-data', 'ListarticleController@anyData')->name('listarticledata');


Route::get('/add-article', 'AddArticleController@index');
Route::post('/add-article', 'AddArticleController@add');
Route::get('/categoryAjax', 'AddArticleController@category');


Route::get('/collect', 'collectController@index')->name('collect');

Route::get('listMember', 'ListMemberController@index');
Route::get('listPartner', 'ListPartnerController@index');
Route::get('/list-collect', 'ListCollectController@index');
Route::get('adminAddMember', 'AdminAddMemberController@index');
Route::post('adminAddMember', 'AdminAddMemberController@store');
Route::get('updateAdminMember','AdminAddMemberController@edit');
Route::post('updateAdminMember','AdminAddMemberController@update');
Route::get('AjaxDeleteAdminMember','AdminAddMemberController@delete');
Route::get('adminAddPartner','AdminAddPartnerController@index');
Route::post('adminAddPartner','AdminAddPartnerController@store');
Route::post('AjaxAdminAddPartner', 'AdminAddPartnerController@AjaxPostalCode');