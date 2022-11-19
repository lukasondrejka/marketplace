<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Authenticate;
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


Route::get('items', function () {
    return view('items/items');
})->name('items.item');

Route::get('item', function () {
    return view('items/item');
})->name('items.item');

Route::get('create-item', function () {
    return view('items/item-form');
})->name('items.item-form');
require __DIR__.'/auth.php';
