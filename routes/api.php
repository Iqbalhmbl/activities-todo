<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//activitiesItem
Route::get('activities-items',[App\Http\Controllers\API\ApiController::class, 'activitiesItem']);
Route::get('activities-items/{id}',[App\Http\Controllers\API\ApiController::class, 'ActivitiesItemOne']);
Route::post('activities-items/create',[App\Http\Controllers\API\ApiController::class, 'createActivities']);
Route::get('activities-items/delete/{id}',[App\Http\Controllers\API\ApiController::class, 'deleteActivities']);
Route::patch('activities-items/update/{id}/',[App\Http\Controllers\API\ApiController::class, 'updateActivities']);

//todoItem
Route::get('todo-items',[App\Http\Controllers\API\ApiController::class, 'todoItem']);
Route::get('todo-items/{id}',[App\Http\Controllers\API\ApiController::class, 'todoItemOne']);
Route::post('todo-items/create',[App\Http\Controllers\API\ApiController::class, 'createTodo']);
Route::get('todo-items/delete/{id}',[App\Http\Controllers\API\ApiController::class, 'deleteTodo']);
Route::patch('todo-items/update/{id}/',[App\Http\Controllers\API\ApiController::class, 'updateTodo']);
