<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Profile;
use App\Livewire\Home;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // redirect ke halaman login
    return redirect('login');
});

//group middleware
Route::middleware('auth')->group(function () {
    Route::get('/home', Home::class)->name('home');
    Route::get('/profile', Profile::class)->name('profile');
});

//middleware guest, sehingga kalau belum login tidak bisa akses halaman pada middleware auth
Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
});
