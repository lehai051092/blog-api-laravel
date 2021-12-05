<?php

use App\Http\Controllers\Backend\AdminController;
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

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('pages.dashboard');
    })->name('dashboard');

    Route::get('signin', function () {
        return view('pages.admin.login');
    });

    Route::post('signin', [AdminController::class, 'signIn'])->name('signIn');
    Route::get('signout', [AdminController::class, 'signOut'])->name('signOut');
    Route::get('register', [AdminController::class, 'register'])->name('register');
    Route::post('store', [AdminController::class, 'store'])->name('store');
    Route::get('profile/{id}', [AdminController::class, 'profile'])->name('profile');
    Route::post('update/{id}', [AdminController::class, 'update'])->name('update');
});
