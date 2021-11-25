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
        return view('pages.login');
    });

    Route::post('signin', [AdminController::class, 'signIn'])->name('signIn');
    Route::get('signout', [AdminController::class, 'signOut'])->name('signOut');
});
