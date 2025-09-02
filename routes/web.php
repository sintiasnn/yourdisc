<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\MemberController;


use App\Http\Controllers\LoanController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('films', FilmController::class);
Route::resource('members', MemberController::class);
Route::resource('loans', LoanController::class);
Route::post('loans/{loan}/return', [LoanController::class, 'return'])->name('loans.return');
