<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\AuthController;


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->get('/employees', [ApiController::class, 'index']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
