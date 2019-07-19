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
Auth::routes(['verify' => true]);
Auth::routes(['register' => false]);
Auth::routes(['reset' => true]);

Route::get('/about', 'AboutController@index');

Route::get('/contact', 'ContactController@index');
Route::post('/contact', 'ContactController@store');

Route::get('/scan', 'ScanController@index');

Route::get('/article', 'ArticleController@index')->name('article');
Route::post('/article', 'ArticleController@vendu');


Route::group(['middleware' => ['auth']], function () {


    Route::group(['middleware' => ['admin']], function () {

        Route::get('listMember', 'ListMemberController@index');

        Route::get('listPartner', 'ListPartnerController@index');

        Route::get('adminAddMember', 'AdminAddMemberController@index');
        Route::post('adminAddMember', 'AdminAddMemberController@store');
        Route::get('updateAdminMember', 'AdminAddMemberController@edit');
        Route::post('updateAdminMember', 'AdminAddMemberController@update');
        Route::get('AjaxDeleteAdminMember', 'AdminAddMemberController@delete');

        Route::get('adminAddPartner', 'AdminAddPartnerController@index');
        Route::post('adminAddPartner', 'AdminAddPartnerController@store');
        Route::post('AjaxAdminAddPartner', 'AdminAddPartnerController@AjaxPostalCode');
    });


    Route::group(['middleware' => ['memberAdmin']], function () {

        Route::get('/listCollect', 'ListCollectController@index')->name('listCollect');
        Route::get('/listCollectData', 'ListCollectController@anyData')->name('listcollectdata');

        Route::get('/validateCollect', 'ValidateCollectController@index');
        Route::post('/validateCollect', 'ValidateCollectController@store');
        Route::get('/bonCollectPdf', 'ValidateCollectController@pdfBonCollect');

        Route::get('/listArticle', 'ListarticleController@index');
        Route::get('/listArticle-data', 'ListarticleController@anyData')->name('listarticledata');
    });

    Route::group(['middleware' => ['partner']], function () {

        Route::get('/recapCollect', 'RecapCollectController@index')->name('recapCollect');
        Route::get('/recapCollectValidate', 'RecapCollectController@store');
        Route::get('/recapCollectCancel', 'RecapCollectController@cancel');

        Route::get('/collectHistory', 'CollectHistoryController@index');
        Route::get('/collectHistoryValidate', 'CollectHistoryController@tableCollectValidate')->name('collectHistoryValidate');
        Route::get('/collectHistoryWaiting', 'CollectHistoryController@tableCollectWaiting')->name('collectHistoryWaiting');
        Route::get('/bonCollectPdfHistory', 'CollectHistoryController@pdfCollectHistory');

        Route::get('/addArticle', 'AddArticleController@index');
        Route::post('/addArticle', 'AddArticleController@add');
        Route::get('/categoryAjax', 'AddArticleController@category');

        Route::get('/AccountPartner', 'AccountPartnerController@index');
        Route::get('/AccountPartner/update', 'AccountPartnerUpdateController@index');
        Route::post('/AccountPartner/update', 'AccountPartnerUpdateController@edit');
    });
});


Route::get('/home', 'HomeController@index')->name('home');

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
Route::get('adminAddPartner','AdminAddPartnerController@index');
Route::post('adminAddPartner','AdminAddPartnerController@store');
Route::post('AjaxAdminAddPartner', 'AdminAddPartnerController@ajaxPostalCode');
Route::get('AjaxDeleteAdminMember','AdminAddMemberController@ajaxDeleteAdminMember');