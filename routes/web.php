<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return auth()->check() ? redirect()->route('dashboard') : redirect()->route('login');
// });

// Route::middleware(['auth'])->group(function () {
//     route::get('/dashboard', function() {
//         return view('dashboard');
//     })->name('dashboard');
// });

// Route::middleware('auth')->group(function() {
//     Route::livewire('/dashboard/superadmin', 'pages::superadmin.dashboard')
//         ->name('superadmin-dashboard');
// });


Route::livewire('/catalog', 'pages::catalog.index')
    ->name('catalog-index');
Route::livewire('/catalog/create', 'pages::catalog.create')
    ->name('catalog-create');
Route::livewire('/catalog/edit', 'pages::catalog.edit')
    ->name('catalog-edit');

Route::livewire('/dashboard', 'pages::dashboard')
    ->name('dashboard');