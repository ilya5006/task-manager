<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/tasks', [TaskController::class, 'get']);
Route::get('/tasks/{id}', [TaskController::class, 'getById'])->whereNumber('id');
Route::post('/tasks', [TaskController::class, 'create']);
Route::delete('/tasks/{id}', [TaskController::class, 'delete'])->whereNumber('id');
Route::put('/tasks/{id}', [TaskController::class, 'update'])->whereNumber('id');