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

Route::get('/logout', function () {
    return view('logout');
});
Auth::routes();

// Route::group(['middleware' => ['role:admin']], function (){

//activities
Route::get('/activities',[App\Http\Controllers\ActivitiesController::class, 'index'])->name('act.index');
Route::get('/activities/create',[App\Http\Controllers\ActivitiesController::class, 'create'])->name('act.create');
Route::post('/activities/store',[App\Http\Controllers\ActivitiesController::class, 'store'])->name('act.store');
Route::get('/activities/edit/{id}',[App\Http\Controllers\ActivitiesController::class, 'edit'])->name('act.edit');
Route::put('/activities/update/{id}',[App\Http\Controllers\ActivitiesController::class, 'update'])->name('act.update');
Route::get('/activities/delete/{id}',[App\Http\Controllers\ActivitiesController::class, 'destroy'])->name('act.destroy');

//todos
Route::get('/todos',[App\Http\Controllers\TodosController::class, 'index'])->name('todo.index');
Route::get('/todos/create',[App\Http\Controllers\TodosController::class, 'create'])->name('todo.create');
Route::post('/todos/store',[App\Http\Controllers\TodosController::class, 'store'])->name('todo.store');
Route::get('/todos/edit/{id}',[App\Http\Controllers\TodosController::class, 'edit'])->name('todo.edit');
Route::put('/todos/update/{id}',[App\Http\Controllers\TodosController::class, 'update'])->name('todo.update');
Route::get('/todos/delete/{id}',[App\Http\Controllers\TodosController::class, 'destroy'])->name('todo.destroy');

// });
