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
Route::group(['domain' => env('APP_URL')], function () {
   
});

Route::group(['domain' => env('APP_HOST_URL')], function () {
    
});

Route::group(['domain' => env('APP_AGENCY_URL')], function () {
    
});

Route::group(['domain' => env('APP_ADMIN_URL')], function () {

});
