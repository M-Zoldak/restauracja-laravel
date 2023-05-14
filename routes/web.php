<?php

use App\Http\Controllers\DishCategoryController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\WaiterController;
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

Route::get('/', function () {
    return view('main');
});

Route::resource("dishes", DishController::class);
Route::resource("dish_categories", DishCategoryController::class);
Route::resource("orders", OrderController::class);
Route::resource("order_items", OrderItemController::class);
Route::resource("tables", TableController::class);
Route::resource("waiters", WaiterController::class);
