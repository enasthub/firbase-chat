<?php

use Illuminate\Support\Facades\Route;

$namespace = "App\\Http\\Controllers\\";

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/save-token', $namespace.'FCMController@index');
