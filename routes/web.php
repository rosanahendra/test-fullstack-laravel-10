<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\TaskController;
use App\Http\Controllers\Api\V1\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//login
Route::get('/login_user', [AuthController::class, 'login_user']);
Route::post('/login_user_api', [AuthController::class, 'login_user_api']);

//task
Route::get('/task', [TaskController::class, 'task']);
Route::post('/table_task', [TaskController::class, 'table_task']);
Route::post('/create_task', [TaskController::class, 'create_task']);
Route::post('/edit_task', [TaskController::class, 'edit_task']);
Route::post('/hapus_task', [TaskController::class, 'hapus_task']);
