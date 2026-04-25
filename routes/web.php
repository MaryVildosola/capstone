<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', function () {
    // For demo purposes, any login redirects to the nurse dashboard
    return redirect()->route('nurse');
});

Route::get('/nurse', function () {
    return view('nurse.dashboard');
})->name('nurse');

Route::post('/register', function () {
    // Handle registration logic
    return 'Registration successful! (Placeholder)';
})->name('register');



