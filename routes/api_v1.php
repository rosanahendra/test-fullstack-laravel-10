<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\PostController;
use App\Http\Controllers\Api\V1\M_category_tasksController;
use App\Http\Controllers\Api\V1\TaskController;

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


Route::controller(AuthController::class)->group(function () {
    Route::post('register', 'register');
    Route::post('otp', 'otp');
    Route::post('login', 'login');
    
    Route::middleware('auth:sanctum')->group(function () {

        Route::prefix('profile')->group(function () {
            Route::get('/', 'profile');
            Route::post('/', 'updateProfile');
        });

        Route::post('logout', 'logout');
    });
});

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('posts', PostController::class);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/data_task_category',[M_category_tasksController::class, 'data_task_category']);
    Route::post('/store_category_task',[M_category_tasksController::class, 'store_category_task']);
    Route::post('/update_category_task/{id}',[M_category_tasksController::class, 'update_category_task']);
    Route::post('/delete_category_task/{id}',[M_category_tasksController::class, 'delete_category_task']);
    
    Route::post('/data_task',[TaskController::class, 'data_task']);
    Route::post('/store_task',[TaskController::class, 'store_task']);
    Route::post('/update_task/{id}',[TaskController::class, 'update_task']);
    Route::post('/delete_task/{id}',[TaskController::class, 'delete_task']);
    Route::post('/data_task_id/{id}',[TaskController::class, 'data_task_id']);
});