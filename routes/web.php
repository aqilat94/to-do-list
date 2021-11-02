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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/index/list', [App\Http\Controllers\ToDoListController::class, 'index'])->name('index:list');
Route::get('/create/list', [App\Http\Controllers\ToDoListController::class, 'create'])->name('create:list');
Route::get('/show/list', [App\Http\Controllers\ToDoListController::class, 'show'])->name('show:list');
Route::post('/store/list', [App\Http\Controllers\ToDoListController::class, 'store'])->name('store:list');
Route::get('/edit/list/{list}', [App\Http\Controllers\ToDoListController::class, 'edit'])->name('edit:list');
Route::post('/update/list/{list}', [App\Http\Controllers\ToDoListController::class, 'update'])->name('update:list');
Route::get('/toggle/list/{list}', [App\Http\Controllers\ToDoListController::class, 'toggle'])->name('toggle:list');
Route::get('/delete/list/{list}', [App\Http\Controllers\ToDoListController::class, 'destroy'])->name('delete:list');