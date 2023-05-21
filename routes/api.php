<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;



    
Route::get('/hotels', [ApiController::class,'index']);
Route::get('/room', [ApiController::class,'room']);
Route::post('/register', [ApiController::class, 'register']);
Route::post('/login', [ApiController::class, 'login']);
Route::post('/logout', [ApiController::class, 'logout'])->middleware('auth:sanctum');


