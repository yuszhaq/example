<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;



Route::view('/', 'home');
Route::view('/contact', 'contact');
// Route::resource('jobs', JobController::class)->only(['index', 'show']);
// Route::resource('jobs', JobController::class)->except(['index', 'show']);


Route::controller(JobController::class)->group(function () {
  Route::get('/jobs', 'index');
  Route::get('/jobs/create', 'create');
  Route::post('/jobs', 'store')->middleware('auth');
  Route::get('/jobs/{job}', 'show');
  Route::get('/jobs/{job}/edit', 'edit')->middleware('auth')->can('click', 'job');
  Route::patch('/jobs/{job}', 'update')->middleware('auth')->can('click', 'job');
  Route::delete('/jobs/{job}', 'destroy')->middleware('auth')->can('click', 'job');
});

// Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

// login
Route::controller(SessionController::class)->group(function () {
  Route::get('/login', 'create');
  Route::post('/login', 'store');
  Route::post('/logout', 'destroy');
});