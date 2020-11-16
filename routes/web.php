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
Route::group(['middleware' => []], function () {

    Route::get('/', function () {
        return view('home');
    });

    Route::get('/test2', function () {
        return view('test');
    });


    Route::group(['namespace' => 'BanHangPages', 'prefix' => 'banhang', 'as'=>'banhang'], function() {
        Route::group(['namespace' => 'Order', 'prefix' => 'order', 'as'=>'.order'], function() {
            Route::get('/', 'IndexController')->name('.index');
            Route::get('/create', 'CreateController')->name('.create');
            // Route::post('/store', 'StoreController')->name('.store');
            // Route::get('/edit/{id}', 'EditController')->name('.edit');
            // Route::put('/update/{id}', 'UpdateController')->name('.update');
        });
    });

    Route::group(['namespace' => 'DuLieuNen', 'prefix' => 'dln', 'as'=>'dln'], function() {
        Route::group(['namespace' => 'LoaiSanPham', 'prefix' => 'loaisanpham', 'as'=>'.loaisanpham'], function() {
            Route::get('/type={type}', 'IndexController')->name('.index');
            Route::get('/create/type={type}', 'CreateController')->name('.create');
            Route::post('/store', 'StoreController')->name('.store');
            Route::get('/edit/{id}/type={type}', 'EditController')->name('.edit');
            Route::put('/update/{id}', 'UpdateController')->name('.update');
        });
        Route::group(['namespace' => 'SanPham', 'prefix' => 'sanpham', 'as'=>'.sanpham'], function() {
            Route::get('/type={type}', 'IndexController')->name('.index');
            Route::get('/create/type={type}', 'CreateController')->name('.create');
            Route::post('/store', 'StoreController')->name('.store');
            Route::get('/edit/{id}/type={type}', 'EditController')->name('.edit');
            Route::put('/update/{id}', 'UpdateController')->name('.update');
        });
        Route::group(['namespace' => 'DonViDoLuong', 'prefix' => 'donvi', 'as'=>'.donvi'], function() {
            Route::get('/', 'IndexController')->name('.index');
            Route::get('/create', 'CreateController')->name('.create');
            Route::post('/store', 'StoreController')->name('.store');
            Route::get('/edit/{id}}', 'EditController')->name('.edit');
            Route::put('/update/{id}', 'UpdateController')->name('.update');
        });
    });

   
    
});
