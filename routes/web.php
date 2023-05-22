<?php

use App\Http\Controllers\DishCategoryController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\ProfileController;
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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/', function () {
        return view('main');
    });

    Route::resource("dishes", DishController::class);

    Route::resource("dish_categories", DishCategoryController::class);

    Route::resource("orders", OrderController::class);

    Route::resource("order_items", OrderItemController::class);

    Route::resource("tables", TableController::class);
    Route::get('/tables_edit', [TableController::class, 'edit_index'])->name("tables.edit_index");

    Route::scopeBindings()->group(function () {
        Route::get("tables/addPersonToTable/{table}", [TableController::class, "addPersonToTable"])->name("tables.addPersonToTable");
        Route::get("tables/removePersonFromTable/{table}", [TableController::class, "removePersonFromTable"])->name("tables.removePersonFromTable");
    });

    Route::resource("waiters", WaiterController::class);
});

require __DIR__ . '/auth.php';
