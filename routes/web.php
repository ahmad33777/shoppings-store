<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Routing  to Dashbord

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/logout', [LoginController::class, 'logout']);


Route::get('dashbord/stores', 'DashbordController\StoreController@index')->middleware('auth');
Route::get('dashbord/store/create',  'DashbordController\StoreController@create')->middleware('auth');
Route::post('dashbord/store/store', 'DashbordController\StoreController@store')->middleware('auth');

Route::get('dashbord/store/edit/{id}', 'DashbordController\StoreController@edit')->middleware('auth');

Route::POST('dashbord/store/update/{id}', 'DashbordController\StoreController@update')->middleware('auth');
Route::post('dashbord/store/destroy/{id}', 'DashbordController\StoreController@destroy');


Route::get('dashbord/products/', 'DashbordController\ProductController@index')->middleware('auth');
Route::get('dashbord/product/create', 'DashbordController\ProductController@create')->middleware('auth');
Route::post('dashbord/product/store', 'DashbordController\ProductController@store')->middleware('auth');
Route::get('dashbord/product/edit/{id}', 'DashbordController\ProductController@edit')->middleware('auth');
Route::POST('dashbord/product/update/{id}', 'DashbordController\ProductController@update')->middleware('auth');
Route::post('dashbord/product/destroy/{id}', 'DashbordController\ProductController@destroy')->middleware('auth');

Route::get('dashbord/transactions/', 'DashbordController\TransactionController@index')->middleware('auth');;
Route::get('dashbord/transactions/report', 'DashbordController\TransactionController@report')->middleware('auth');;


//Route to public website
Route::get('ecommerce/home', 'PublicWbController\PublicController@home');
Route::post('ecommerce/products/search/{store_id}', 'PublicWbController\PublicController@seach');
Route::get('ecommerce/product/Details/{id}', 'PublicWbController\PublicController@shwoProductDetails');
Route::get('ecommerce/products/{id}', 'PublicWbController\PublicController@showProduct');


Route::post('ecommerce/products/purchaseTransactio/{id}', 'PublicWbController\PublicController@purchaseTransactio');
