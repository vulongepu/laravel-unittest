<?php

use Illuminate\Support\Facades\Route;
//use Drag\Account\Controllers\AccountController;
use Drag\Account\Controllers\AccountController;
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


Route::get('/test2', [AccountController::class, 'index']);

//Route::get('/test3', function () {
//    return 'long';
//});
