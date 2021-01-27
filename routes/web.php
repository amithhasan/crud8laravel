<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LaravelCrud;

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

Route::get('crud',       [LaravelCrud::class, 'index']);

Route::post('add',       [LaravelCrud::class, 'add']);

Route::get('edit/{id}',  [LaravelCrud::class, 'edit']);
Route::post('update',    [LaravelCrud::class, 'update'])->name('update');

Route::get('delete/{id}',[LaravelCrud::class, 'delete']);



/* Route::get('member',     [StudentController::class, 'index']);

Route::post('add',       [StudentController::class, 'add']);

Route::get('edit/{id}',  [StudentController::class, 'edit']);
Route::post('update',    [StudentController::class, 'update'])->name('update');
Route::get('delete/{id}',[StudentController::class, 'delete']);
 */