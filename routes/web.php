<?php

use Illuminate\Support\Facades\Route;

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
    return redirect()->route('login');
});

Auth::routes();

Route::prefix('admin')->name('admin.')->middleware(['web', 'auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('roles', \App\Http\Controllers\RoleController::class);
    Route::resource('users', \App\Http\Controllers\UserController::class);
    Route::resource('categories', \App\Http\Controllers\CategoryController::class);
    Route::resource('sizes', \App\Http\Controllers\SizeController::class);
    Route::resource('warehouses', \App\Http\Controllers\WareHousController::class);
    Route::resource('products', \App\Http\Controllers\ProductController::class);
    Route::resource('purchases', \App\Http\Controllers\PurchasesController::class);
    Route::resource('shelf', \App\Http\Controllers\ShelfController::class);
    Route::resource('agent', \App\Http\Controllers\AgentController::class);

    Route::get('/return',[\App\Http\Controllers\QaytishController::class,'index'])->name('return.index');
    Route::post('/return/store',[\App\Http\Controllers\QaytishController::class,'store'])->name('return.store');

    Route::get('menu', function () {return view('admin.menu');})->name('menu');
    Route::post('baho', [App\Http\Controllers\PurchasesController::class, 'baho'])->name('baho');
});

Route::prefix('api')->name('api.')->group(function () {
    Route::resource('categories', \App\Http\Controllers\Api\CategoryController::class);
});
