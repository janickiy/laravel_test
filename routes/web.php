<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DataTableController;

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


Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.submit');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [UserController::class, 'index'])->name('admin.index');


Route::group(['prefix' => 'users'], function () {
    Route::get('create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('store', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('edit/{id}', [UserController::class, 'edit'])->name('admin.users.edit')->where('id', '[0-9]+');
    Route::put('update', [UserController::class, 'update'])->name('admin.users.update');
    Route::post('destroy', [UserController::class, 'destroy'])->name('admin.users.destroy');
});

Route::group(['prefix' => 'datatable'], function () {
    Route::any('users', [DataTableController::class, 'users'])->name('admin.datatable.users');
});




