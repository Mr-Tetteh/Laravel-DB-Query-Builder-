<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::post('/create/dummy', [UserController::class, 'created_dummy_users'])->name('users.create.dummy');
Route::delete('/delete/dummy', [UserController::class, 'delete_dummy_users'])->name('users.delete.dummy');
Route::resource('/user', UserController::class);

