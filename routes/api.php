<?php

use App\Http\Controllers\TodoController;
use App\Models\Todo;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('welcome'));

Route::resource('/todos',TodoController::class)->except(['edit','create','show']);

Route::get('/todos/deleted', [TodoController::class, 'deleted']);

