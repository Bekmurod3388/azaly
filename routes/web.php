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
    Route::resource('categories',\App\Http\Controllers\CategoryController::class);
    Route::resource('sizes',\App\Http\Controllers\SizeController::class);
    Route::resource('warehouses',\App\Http\Controllers\WareHousController::class);
    Route::resource('products',\App\Http\Controllers\ProductController::class);
    Route::resource('shelf',\App\Http\Controllers\ShelfController::class);
    Route::resource('agent',\App\Http\Controllers\AgentController::class);

});

Route::prefix('api')->name('api.')->group(function (){
    Route::resource('categories',\App\Http\Controllers\Api\CategoryController::class);
});
