<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\ideaController;
use App\Http\Controllers\IdeaLikeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/',[DashboardController::class, 'index'])->name('dashboard');
Route::get('/profile',[ProfileController::class, 'index']);
Route::post('', [ideaController::class, 'store'])->name('store');
Route::get('/idea/{id}', [ideaController::class, 'show'])->name('idea.show');
Route::delete('/idea/{id}', [ideaController::class, 'destroy'])->name('idea.destroy')->middleware('auth');
Route::get('/idea/{id}/edit', [ideaController::class, 'edit'])->name('idea.edit')->middleware('auth');
Route::put('/idea/{id}', [ideaController::class, 'update'])->name('idea.update')->middleware('auth');
Route::post('/ideas/{idea}/comments', [CommentController::class, 'store'])->name('ideas.comments.store')->middleware('auth');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store']);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show')->middleware('auth');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('auth');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update')->middleware('auth');
Route::get('/profile', [UserController::class, 'profile'])->name('profile')->middleware('auth');

Route::post('users/{user}/follow', [FollowerController::class ,'follow'])->name('users.follow')->middleware('auth');
Route::post('users/{user}/unfollow', [FollowerController::class ,'unfollow'])->name('users.unfollow')->middleware('auth');

Route::post('ideas/{idea}/like', [IdeaLikeController::class ,'like'])->name('ideas.like')->middleware('auth');
Route::post('ideas/{idea}/unlike', [IdeaLikeController::class ,'unlike'])->name('ideas.unlike')->middleware('auth');
// Route::resource('idea', ideaController::class)->except(['index','create','show'])->middleware('auth');



Route::get('/terms',function(){
    return view('terms');
});

