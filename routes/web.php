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

    \Auth::routes();

    Route::get('/logout',function(){
            Auth::logout();
            return redirect('/');
    });
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
    Route::get('/home', 'HomeController@index')->name('home');


########### Vendor Routes ############################
    //vendor login and register page
    Route::get('vendor/signup',  function () {
        return view('Auth\vendor');
    });
     
    //vendor register
    Route::post('vendor/register','Auth\VendorRegisterController@createVendor');

    //login route
    Route::post('vendor/login','Auth\VendorLoginController@vendorLogin');

    // Logout Routes
    Route::get('/vendor/logout','Auth\VendorLoginController@vendorLogout')->name('vendor.logout');

Route::prefix('/vendor')->name('vendor.')->namespace('Vendor')->middleware('vendor.auth')->group(function(){
        
    //vendor dashboard
    Route::get('/dashboard','VendorController@index')->name('dashboard');       

    // //Forgot Password Routes
    // Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
    // Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');

    // //Reset Password Routes
    // Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
    // Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');   
});
################### Vendor Routes End############################
       #############################################                                                             
###################### Admin Routes ############################
    
    //Admin View (Register and Login
    Route::get('/admin/sign', function(){
        return view('Auth\admin');
    });

    //admin register
    Route::post('/register/admin','Auth\AdminRegisterController@createAdmin');

    //login route
    Route::post('/login/admin','Auth\AdminLoginController@adminLogin');

    // Logout Routes
    Route::get('/admin/logout','Auth\AdminLoginController@adminLogout')->name('admin.logout');

    //group admin
    Route::prefix('/admin')->name('admin.')->namespace('Admin')->middleware('admin.auth')->group(function(){
        
        //admin dashboard
        Route::get('/admin','AdminController@index')->name('admin'); 
        
       
       
    });