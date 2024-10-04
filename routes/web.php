<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KarlotblController;

// Existing routes...
Route::get('/', [KarlotblController::class, 'index'])->name('karlotbl.index');
Route::get('/karlotbl/create', [KarlotblController::class, 'create'])->name('karlotbl.create');
Route::post('/karlotbl', [KarlotblController::class, 'store'])->name('karlotbl.store');
Route::get('/karlotbl/edit/{id}', [KarlotblController::class, 'edit'])->name('karlotbl.edit');
Route::put('/karlotbl/update/{id}', [KarlotblController::class, 'update'])->name('karlotbl.update');
Route::delete('/karlotbl/destroy/{id}', [KarlotblController::class, 'destroy'])->name('karlotbl.destroy');
