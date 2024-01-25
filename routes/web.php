<?php


use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
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
    Route::get('/', [UserController::class, 'index'])->name('login');
    Route::post('/', [UserController::class, 'login']);
});

Route::middleware(['auth'])->group(function(){
    Route::get('/admin/home', [AdminController::class, 'index'])->name('admin')->middleware('user.access:admin');
    Route::get('/cashier/home', [CashierController::class, 'index'])->name('cashier')->middleware('user.access:cashier');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});