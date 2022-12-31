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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', ['App\Http\Controllers\HomeController','index']);
Route::post('/home/store', ['App\Http\Controllers\HomeController','store'])->name('home.store');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::middleware('auth')->group(function () {

    Route::get('/projects/create', ['App\Http\Controllers\ProjectController','create']);

    Route::post('/projects', ['App\Http\Controllers\ProjectController','store'])->name('project.store');


    Route::get('/projects/{project}', ['App\Http\Controllers\ProjectController','show']);


    Route::get('/projects', ['App\Http\Controllers\ProjectController','index']);

    Route::post('/projects/{project}/tasks', ['App\Http\Controllers\ProjectTasksController','store']);

    Route::patch('/projects/{project}/tasks/{task}',  ['App\Http\Controllers\ProjectTasksController','update']);

});
