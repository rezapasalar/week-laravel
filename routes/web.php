<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', \App\Http\Livewire\User\Home\Index::class)->name('home');

Route::get('/about', \App\Http\Livewire\User\About\Index::class)->name('about');

Route::get('/products', \App\Http\Livewire\User\Products\Index::class)->name('user.products');

Route::get('/employment', \App\Http\Livewire\User\Employment\Index::class)->middleware('locale.fa')->name('employment');

Route::get('/representation', \App\Http\Livewire\User\Representation\Create::class)->name('representation');

Route::get('/sub-company', \App\Http\Livewire\User\SubCompany\Index::class)->name('subcompany');

Route::get('/contact', \App\Http\Livewire\User\Contact\Index::class)->name('contact');

Route::get('/language/{locale}', [\App\Http\Controllers\UserController::class, 'setLocaleSession'])->name('language');

Route::get('/darkmode/{theme}', fn ($theme) => cache()->set('darkmode', $theme));