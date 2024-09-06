<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ideaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/',[DashboardController::class, 'index'])->name('dashboard');
Route::get('/profile',[ProfileController::class, 'index']);
Route::post('/idea', [ideaController::class, 'store'])->name('idea.create');
Route::get('/idea/{id}', [ideaController::class, 'show'])->name('idea.show');
Route::delete('/idea/{id}', [ideaController::class, 'destroy'])->name('idea.destroy');
Route::get('/idea/{id}/edit', [ideaController::class, 'edit'])->name('idea.edit');
Route::put('/idea/{id}', [ideaController::class, 'update'])->name('idea.update');

Route::get('/terms',function(){
    return view('terms');
});

