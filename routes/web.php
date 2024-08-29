<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ideaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/',[DashboardController::class, 'index'])->name('dashboard');
Route::get('/profile',[ProfileController::class, 'index']);
Route::post('/idea', [ideaController::class, 'store'])->name('idea.create');
Route::get('/terms',function(){
    return view('terms');
});

