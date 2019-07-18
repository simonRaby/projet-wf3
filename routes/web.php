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
})->name('home');

Auth::routes();
Auth::routes(['register' => false]);
Auth::routes(['reset' => true]);

Route::get('/about', 'AboutController@index');
Route::get('/contact', 'ContactController@index');
Route::post('/contact', 'ContactController@store');

Route::get('/scan', 'ScanController@index');

Route::get('/article', 'ArticleController@index' )->name('article');
Route::post('/article', 'ArticleController@vendu' );


Route::group(['middleware' => ['auth']], function () {


    Route::group(['middleware' => ['admin']], function () {

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

    });


    Route::group(['middleware' => ['memberAdmin']], function () {

        Route::get('/listCollect', 'ListCollectController@index')->name('listCollect');
        Route::get('/listCollectData', 'ListCollectController@anyData')->name('listcollectdata');

        Route::get('/validateCollect', 'ValidateCollectController@index');
        Route::post('/validateCollect', 'ValidateCollectController@store');
        Route::get('/bonCollectPdf', 'ValidateCollectController@pdfBonCollect');

        Route::get('/list-article', 'ListarticleController@index');
        Route::get('/list-article-data', 'ListarticleController@anyData')->name('listarticledata');
    });

    Route::group(['middleware' => ['partner']], function () {
        Route::get('/addArticle', 'AddArticleController@index');

        Route::get('/recapCollect', 'RecapCollectController@index');
        Route::post('/recapCollect', 'RecapCollectController@store');

        Route::get('/collectHistory', 'CollectHistoryController@index');
        Route::get('/collectHistoryData', 'CollectHistoryController@anyData')->name('collectHistoryData');
        Route::get('/bonCollectPdfHistory', 'CollectHistoryController@pdfCollectHistory');

        Route::get('/add-article', 'AddArticleController@index');
        Route::post('/add-article', 'AddArticleController@add');
        Route::get('/categoryAjax', 'AddArticleController@category');

    });
});


Route::get('/home', 'HomeController@index')->name('home');
