<?php


use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CashierController;
use Illuminate\Support\Facades\Route;
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
Route::middleware(['guest'])->group(function(){
    Route::get('/', [AuthController::class, 'index']);
    Route::post('/', [AuthController::class, 'login']);
});

Route::middleware(['auth', 'user.access:admin,cashier'])->group(function () {
    Route::get('/home', [AdminController::class, 'index']);    
    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::middleware(['auth', 'user.access:admin'])->group(function () {
    Route::get('/user', [UserController::class, 'index']);
    Route::post('/user/store', [UserController::class, 'store']);
    Route::post('/user/update/{id}', [UserController::class, 'update']);
    Route::get('/user/destroy/{id}', [UserController::class, 'destroy']);
});

Route::middleware(['auth', 'user.access:cashier'])->group(function () {
    // Your protected routes for cashier role only
});
