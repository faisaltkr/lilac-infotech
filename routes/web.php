<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::get('/', function () {
    return view('welcome',['users' => User::all()]);
});


Route::get('search',[UserController::class,'index'])->name('search');