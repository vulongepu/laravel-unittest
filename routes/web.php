<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Drag\Order\Order;
use App\Jobs\ProcessTest;

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

    ProcessTest::dispatch()->delay(1);

    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index']);


Route::get('/order', function() {
    $order = new Order();

    return $order->list();
});

Route::get('/projects', ['App\Http\Controllers\ProjectController','index']);
Route::get('/projects/{project}', ['App\Http\Controllers\ProjectController','show']);


Route::post('/projects', ['App\Http\Controllers\ProjectController','store']);
