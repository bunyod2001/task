<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'StaffController@index');



Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);


Route::get('/home', 'StaffController@index');

Route::resource('/company', 'CompanyController');

Route::resource('/staff', 'StaffController');
