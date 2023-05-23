<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RazorpayController;
use App\Http\Controllers\RoomController;
use App\Models\Hotels;

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

Route::get('/dashboard', function () {
    
    $hotels = Hotels::get();
    return view('dashboard', compact('hotels'));
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth:admin'])->name('admin.dashboard');

require __DIR__.'/adminauth.php';

Route::middleware('auth:admin')->group(function () {
    Route::get('/hotels', [HotelController::class,'index']);
    Route::get('/hoteladd', [HotelController::class, 'create']);
    Route::post('/hoteladd', [HotelController::class, 'store']);
    Route::put('/hotels/{id}', [HotelController::class, 'update']);
    Route::delete('/hotels/{id}', [HotelController::class, 'destroy']);
    Route::delete('/rooms/{id}', [HotelController::class, 'destroyroom']);
    Route::get('/hotels/{id}/edit', [HotelController::class, 'edit'])->name('hotels.edit');
    Route::get('/hotels/{id}/addroom', [RoomController::class, 'index'])->name('rooms.index');
    Route::post('/hotels/{id}/rooms/create', [RoomController::class, 'create'])->name('rooms.create');
    Route::post('/hotels/{id}/rooms/create/add', [RoomController::class, 'store'])->name('rooms.store');


    Route::get('/userslist', [HotelController::class,'userlist']);
    Route::delete('/userlist/{id}', [HotelController::class, 'userdelete']);
    Route::get('/payment', [HotelController::class,'paymentlist']);

    Route::post('/payment/filter', [FilterController::class,'payment']);
    Route::post('/hotels/filter', [FilterController::class,'hotel']);
    Route::post('/users/filter', [FilterController::class,'user']);




});
 

Route::middleware('auth')->group(function () {
    Route::get('/userhotels', [UserController::class,'index']);
    Route::get('/razorpay', [RazorpayController::class, 'razorpay'])->name('razorpay');
    Route::post('/razorpaypayment', [RazorpayController::class, 'payment'])->name('payment');
    Route::get('/display/{id}', [UserController::class, 'hotelDetails'])->name('hotel-details');
    Route::get('/invoice/{id}/{hotelid}', [RazorpayController::class,'invoice']);


    Route::post('/userhotels/filter', [FilterController::class,'userhotel']);
});



