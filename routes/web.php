<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\MemberController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('films', FilmController::class);
Route::resource('members', MemberController::class);
