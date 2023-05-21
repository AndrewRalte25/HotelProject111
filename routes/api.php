<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;



    
Route::get('/hotels', [ApiController::class,'index']);
Route::get('/room', [ApiController::class,'room']);
Route::get('/user', [ApiController::class,'user']);
Route::put('/userregister', [ApiController::class,'register']);


