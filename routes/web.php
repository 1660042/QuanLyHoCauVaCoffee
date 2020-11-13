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
    Route::group(['namespace' => 'BanHangPages', 'prefix' => 'banhang', 'as'=>'banhang'], function() {
        Route::group(['namespace' => 'Order', 'prefix' => 'order', 'as'=>'.order'], function() {
            
        });

    //        Route::get('/', 'IndexController');
    //     });
    //     Route::group(['namespace' => 'PhongBan', 'prefix' => 'phongban', 'as'=>'.phongban'], function() {
    //         //Route::get('/', 'IndexController');
    //      });

    //     Route::group(['namespace' => 'PhongBan', 'prefix' => 'phongban', 'as' => '.phongban'], function() {
    //         Route::get('/', 'IndexController');
    //     });

    //     Route::group(['namespace' => 'NhanVien', 'prefix' => 'nhanvien', 'as' => '.nhanvien'], function() {
    //         Route::get('/', 'IndexController');
    //     });

    // });

    // Route::group(['namespace' => 'QuanTriHeThong', 'prefix' => 'qtht', 'as'=>'qtht'], function() {
    //     Route::group(['namespace' => 'Quyen', 'prefix' => 'quyen', 'as'=>'.quyen'], function() {
    //         Route::get('/', 'IndexController');
    //         Route::get('/create', 'CreateController')->name('.create');
    //         Route::post('/store', 'StoreController')->name('.store');
    //         Route::get('/edit/{id}', 'EditController')->name('.edit');
    //         Route::put('/update/{id}', 'UpdateController')->name('.update');
    //     });

    //     Route::group(['namespace' => 'QuanLyNhanVien', 'prefix' => 'nhanvien', 'as'=>'.qlnv'], function() {
    //         Route::get('/', 'IndexController');
    //         // Route::get('/create', 'CreateController')->name('.create');
    //         // Route::post('/store', 'StoreController')->name('.store');
    //         // Route::get('/edit/{id}', 'EditController')->name('.edit');
    //         // Route::put('/update/{id}', 'UpdateController')->name('.update');
    //     });

    //     // Route::group(['namespace' => 'PhongBan', 'prefix' => 'phongban', 'as' => '.phongban'], function() {
    //     //     Route::get('/', 'IndexController');
    //     // });

    //     // Route::group(['namespace' => 'NhanVien', 'prefix' => 'nhanvien', 'as' => '.nhanvien'], function() {
    //     //     Route::get('/', 'IndexController');
        //});

    });

   
    
});
