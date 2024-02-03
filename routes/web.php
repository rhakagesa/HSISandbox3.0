<?php


use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemTypeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\ItemController;
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
    Route::get('/profile', [UserController::class, 'profile']);
    Route::post('/profile/update/{id}', [UserController::class, 'updateprofile']);
});

Route::middleware(['auth', 'user.access:admin'])->group(function () {
    //CRUD User
    Route::get('/user', [UserController::class, 'index']);
    Route::post('/user/store', [UserController::class, 'store']);
    Route::post('/user/update/{id}', [UserController::class, 'update']);
    Route::get('/user/destroy/{id}', [UserController::class, 'destroy']);

    //CRUD Item Type
    Route::get('/itemtype', [ItemTypeController::class, 'index']);
    Route::post('/itemtype/store', [ItemTypeController::class, 'store']);
    Route::post('/itemtype/update/{id}', [ItemTypeController::class, 'update']);
    Route::get('/itemtype/destroy/{id}', [ItemTypeController::class, 'destroy']);

    //CRUD Item
    Route::get('/item', [ItemController::class, 'index']);
    Route::post('/item/store', [ItemController::class, 'store']);
    Route::post('/item/update/{id}', [ItemController::class, 'update']);
    Route::get('/item/destroy/{id}', [ItemController::class, 'destroy']);

    //Set Discount
    Route::get('/discount', [DiscountController::class, 'index']);
    Route::post('/discount/update/{id}', [DiscountController::class, 'update']);
});

Route::middleware(['auth', 'user.access:cashier'])->group(function () {
   
});
