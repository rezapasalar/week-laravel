<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('/admin')->group(function () {

    Route::get('/dashboard', \App\Http\Livewire\Admin\Dashboard\Index::class)->middleware(['auth:sanctum', 'verified'])->name('dashboard');

    Route::get('/settings', \App\Http\Livewire\Admin\Settings\Index::class)->name('settings');

    Route::get('/roles', \App\Http\Livewire\Admin\Roles\Index::class)->middleware('auth.super-admin')->name('roles');

    Route::get('/managers', \App\Http\Livewire\Admin\Managers\Index::class)->middleware('auth.super-admin')->name('managers');

    Route::get('/categories', \App\Http\Livewire\Admin\Categories\Index::class)->middleware('auth.super-admin')->name('categories');

    Route::get('/products', \App\Http\Livewire\Admin\Products\Index::class)->name('admin.products');

    Route::get('/licenses', \App\Http\Livewire\Admin\licenses\Index::class)->name('licenses');

    Route::get('/slideshow', \App\Http\Livewire\Admin\Slideshow\Index::class)->name('slideshow');

    Route::get('/employments', \App\Http\Livewire\Admin\Employments\Index::class)->name('employments');

    Route::get('/representations', \App\Http\Livewire\Admin\Representations\Index::class)->name('representations');

    Route::get('/contacts', \App\Http\Livewire\Admin\Contacts\Index::class)->name('contacts');

    Route::get('/comments', \App\Http\Livewire\Admin\Comments\Index::class)->name('comments');

    Route::get('/profile', \App\Http\Livewire\Admin\Profile\Index::class)->name('profile');
    
});