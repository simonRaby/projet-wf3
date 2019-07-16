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

Auth::routes();
Auth::routes(['register' => false]);

Route::get('/about', 'AboutController@index');

Route::get('/contact', 'ContactController@index');
Route::post('/contact', 'ContactController@store');

Route::group(['middleware' => ['App\Http\Middleware\AdminMiddleware']], function () {

    Route::get('/list-collect', 'ListCollectController@index')->name('listCollect');
    Route::get('/list-collect-data', 'ListCollectController@anyData')->name('listcollectdata');
});

Route::group(['middleware' => ['App\Http\Middleware\MemberMiddleware']], function () {

    Route::get('/validate-collect', 'ValidateCollectController@index');
    Route::post('/validate-collect', 'ValidateCollectController@store');
    Route::get('/bonCollectPdf', 'ValidateCollectController@pdfCollect');
});

Route::group(['middleware' => ['App\Http\Middleware\PartnerMiddleware']], function () {

    Route::get('/list-collect', 'ListCollectController@index')->name('listCollect');
    Route::get('/list-collect-data', 'ListCollectController@anyData')->name('listcollectdata');
});


Route::get('/scan', 'ScanController@index');
Route::get('/article', 'ArticleController@index');

Route::get('/home', 'HomeController@index')->name('home');
