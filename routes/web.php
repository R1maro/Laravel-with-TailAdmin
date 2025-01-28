<?php


use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', function () {
    return inertia::render('Dashboard', []);
})->name('dashboard');




require __DIR__.'/auth.php';
