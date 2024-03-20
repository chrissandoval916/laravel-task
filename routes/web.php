<?php

use App\Livewire\Error;
use App\Livewire\Index;
use Illuminate\Support\Facades\Route;
use App\Livewire\Entry\View as EntryView;
use App\Livewire\Entry\Create as EntryCreate;

Route::get('/', Index::class)->name('index');

Route::get('/register', EntryCreate::class)->name('entry.create');

Route::get('/entry/{id}', EntryView::class)->name('entry.view');

Route::get('/error', Error::class)->name('error');

