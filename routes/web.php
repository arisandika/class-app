<?php

use App\Livewire\Students;
use Illuminate\Support\Facades\Route;

Route::get('/', Students::class)->name('home');
