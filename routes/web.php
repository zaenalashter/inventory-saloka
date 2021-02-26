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
Route::get('/admin/blank', function () {
    return view('welcome');
});


Route::get('storage/{file}',function ($file) {
    return response()->file(storage_path('app/public/'.$file));
});

Route::get('/', 'Dashboard\overview@index');
Route::get('admin', 'Dashboard\overview@index');

Route::get('admin/login', 'Dashboard\login@index');
Route::post('admin/login/submit', 'Dashboard\login@submit');
Route::get('admin/session-flush', 'Dashboard\login@sessionFlush');

//User-config

Route:: resource('menu','c_menu');
Route:: resource('role','c_role');
Route:: resource('user','c_UserManagement');

//Inventory-config
Route:: resource('storehouse', 'c_storehouse');

Route:: resource('supplier', 'c_supplier');

Route::get('/admin/inventory-config/unit', function () {
    return view('inventory-config.unit');
});
Route::get('/admin/inventory-config/raw_product', function () {
    return view('inventory-config.raw_product');
});
Route::get('/admin/inventory-config/half_product', function () {
    return view('inventory-config.half_product');
});
Route::get('/admin/inventory-config/half_product/half_detail', function () {
    return view('inventory-config.half_detail');
});
Route::get('/admin/inventory-config/recipe', function () {
    return view('inventory-config.recipe');
});
Route::get('/admin/inventory-config/recipe/recipe_detail', function () {
    return view('inventory-config.recipe_detail');
});
Route::get('/admin/inventory-config/banquette', function () {
    return view('inventory-config.banquette');
});
