<?php

use Illuminate\Support\Facades\Route;
if(App::environment('production')) {     URL::forceScheme('https'); }
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

Route::get('/shop', function () {
    return view('shop');
});
Route::get('/faq', function () {
    return view('faq');
});
Route::get('/product', function () {
    return view('product');
});
Route::get('/admin', function () {
    return view('admin');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/product-details', function () {
    return view('product-details');
});
Route::get('/about', function () {
    return view('about');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
