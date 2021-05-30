<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resources([
        'info_types' => 'InfoTypesController',
        'info' => 'InfoController',
        'info_img' => 'InfoImgController',
        'shop_type' => 'ShopTypeController',
        'shop' => 'ShopController',
        'shop_img' => 'ShopImgController',
    ]);
    Route::post('/info_types_data', 'InfoTypesController@indexDataTable')->name('info_types.data');
    Route::post('/info_data', 'InfoController@indexDataTable')->name('info.data');
    Route::post('/info_img_data', 'InfoImgController@indexDataTable')->name('info_img.data');

    Route::post('/shop_type_data', 'ShopTypeController@indexDataTable')->name('shop_type.data');
    Route::post('/shop_data', 'ShopController@indexDataTable')->name('shop.data');
    Route::post('/shop_img_data', 'ShopImgController@indexDataTable')->name('shop_img.data');
});

Route::get('/test', 'AdminController@test')->name('test');
