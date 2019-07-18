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
Route::get('/article', 'ArticleController@index');


Route::group(['middleware' => ['auth']], function () {

    Route::group(['middleware' => ['admin']], function () { });

    Route::group(['middleware' => ['memberAdmin']], function () {

        Route::get('/listCollect', 'ListCollectController@index')->name('listCollect');
        Route::get('/listCollectData', 'ListCollectController@anyData')->name('listcollectdata');

        Route::get('/validateCollect', 'ValidateCollectController@index');
        Route::post('/validateCollect', 'ValidateCollectController@store');
        Route::get('/bonCollectPdf', 'ValidateCollectController@pdfBonCollect');
    });

    Route::group(['middleware' => ['partner']], function () {
        Route::get('/addArticle', 'AddArticleController@index');

        Route::get('/recapCollect', 'RecapCollectController@index');
        Route::post('/recapCollect', 'RecapCollectController@store');

        Route::get('/collectHistory', 'CollectHistoryController@index');
        Route::get('/collectHistoryData', 'CollectHistoryController@anyData')->name('collectHistoryData');
        Route::get('/bonCollectPdfHistory', 'CollectHistoryController@pdfCollectHistory');
    });
});






Route::get('/home', 'HomeController@index')->name('home');
