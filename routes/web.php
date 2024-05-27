<?php

use App\Livewire\Books\Index;
use App\Livewire\Counter;
use App\Livewire\CreateBook;
use App\Livewire\CreateCurrency;
use App\Livewire\CreateMetter;
use App\Livewire\ShowBook;
use App\Livewire\ShowMetter;
use App\Livewire\Todos;
use App\Livewire\UpdateBook;
use App\Models\Book;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/home', Index::class)->name('home');
    Route::get('/currency', function () {
        return view('currency');
    })->name('currency');
    Route::get('/create-currency', function () {
        return view('currency');
    })->name('create-currency');
    Route::get('/todos', Todos::class)->name('todos');
    Route::get('/counter', Counter::class)->name('counter');
    Route::get('/currencies/edit/{id?}', CreateCurrency::class)->name('currencies.edit');
});
// books 
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/create-book',CreateBook::class)->name('create-book');
    Route::get('/show-book',ShowBook::class)->name('show-book');
    Route::get('/book/update/{id?}',UpdateBook::class)->name('book.update');
    
    Route::get('/show-metter',ShowMetter::class)->name('show-metter');
    Route::get('/create-metter',CreateMetter::class)->name('create-metter');
});
