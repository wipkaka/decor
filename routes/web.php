<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers;
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
    Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->middleware('checkLogin')->group(function(){
        Route::get('','DashboardController@admin');
        Route::get('dashboard','DashboardController@dashboard');
        Route::get('full-calender','DashboardController@index');
        Route::post('full-calender/add','DashboardController@add');
        Route::post('full-calender/delete','DashboardController@delete');
        Route::post('full-calender/update','DashboardController@update');
        //Route-danhmuc
        Route::get('danhmuc','DanhmucController@getDanhmuc');
        Route::post('danhmuc/them','DanhmucController@postThem');
        Route::get('danhmuc/sua/{id}','DanhmucController@getSua');
        Route::post('danhmuc/sua/{id}','DanhmucController@postSua');
        Route::delete('danhmuc/xoa/{id}','DanhmucController@postXoa');
        //Route-Slide
        Route::get('slide/danhsach','SlideController@getSlides');
        Route::post('slide/them','SlideController@postThem'); 
        Route::delete('slide/xoa/{id}','SlideController@postXoa'); 
        Route::get('slide/sua/{id}','SlideController@getSua');
        Route::post('slide/sua/{id}','SlideController@postSua');
        //Route-tintuc
        Route::get('news/danhsach','NewsController@getNews');
        Route::post('news/them','NewsController@postThem');
        Route::delete('news/xoa/{id}','NewsController@postXoa');
        Route::get('news/sua/{id}','NewsController@getSua');
        Route::post('news/sua/{id}','NewsController@postSua');
        //Route-user
        Route::get('user/danhsach','UserController@getUser')->middleware('admin');
        Route::post('user/them','UserController@postThem')->middleware('admin');
        Route::delete('user/xoa/{id}','UserController@postXoa')->middleware('admin');
        Route::get('user/sua/{id}','UserController@getSua')->middleware('admin');
        Route::post('user/sua/{id}','UserController@postSua')->middleware('admin');
        //Route-Sanpham
        Route::get('sanpham/danhsach','SanPhamController@getSanpham');
        Route::post('sanpham/them','SanPhamController@postThem');
        Route::delete('sanpham/xoa/{id}','SanPhamController@postXoa');
        Route::get('sanpham/sua/{id}','SanPhamController@getSua');
        Route::post('sanpham/sua/{id}','SanPhamController@postSua');
        //Route-config
        Route::get('config','ConfigController@getConfig')->middleware('admin');
        Route::post('config','ConfigController@postConfig')->middleware('admin');
        Route::get('store','ConfigController@getStore')->middleware('admin');
        Route::post('store/add','ConfigController@postAdd')->middleware('admin');
        Route::delete('store/delete/{id}','ConfigController@deleteStr')->middleware('admin');
        Route::get('store/edit/{id}','ConfigController@getEdit')->middleware('admin');
        Route::post('store/edit/{id}','ConfigController@postEdit')->middleware('admin');
        //Route-feddback
        Route::get('feedback','FeedbackController@feedback');
        //ckedit
        Route::post('ckeditor/upload', 'CKEditorController@upload')->name('ckeditor.image-upload');
    });
Route::get('admin/login','App\Http\Controllers\Admin\UserController@getlogin');
Route::post('admin/login','App\Http\Controllers\Admin\UserController@postlogin');
Route::get('admin/logout','App\Http\Controllers\Admin\UserController@getlogout');
//Fonrt
Route::get('/','App\Http\Controllers\PagesController@trangchu');
Route::get('/sanpham','App\Http\Controllers\PagesController@sanpham');
Route::get('/sanpham/{TenKhongDau}','App\Http\Controllers\PagesController@sanphamtype');
Route::get('/chitiet/{TenSanPham}',['as'=>'chitiet','uses'=>'App\Http\Controllers\PagesController@detail']);
Route::get('/tintuc','App\Http\Controllers\PagesController@tintuc');
Route::get('/tintuc/{tieude}','App\Http\Controllers\PagesController@ttdetail');
Route::get('/gioithieu','App\Http\Controllers\PagesController@gioithieu');
Route::get('/chinhsach','App\Http\Controllers\PagesController@chinhsach');
Route::get('/lienhe','App\Http\Controllers\PagesController@lienhe');
Route::post('/search','App\Http\Controllers\PagesController@search');
Route::post('/feedback','App\Http\Controllers\PagesController@feedback');
