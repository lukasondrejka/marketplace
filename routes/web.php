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

// Home
Route::get('/', [HomeController::class, 'index'])
    ->name('home');

// User
Route::get('user/{id}', [UserController::class, 'show'])
    ->name('users.profile');

Route::middleware([Authenticate::class])->group(function () {
    Route::get('profile', [UserController::class, 'showProfile'])
        ->name('users.profile');

    Route::get('profile/edit', [UserController::class, 'edit'])
        ->name('users.edit');

    Route::post('profile/edit', [UserController::class, 'update'])
        ->name('users.update');
});


require __DIR__.'/auth.php';
