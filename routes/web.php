<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactanosController;
use App\Http\Controllers\PackController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\ShowPack;
use App\Livewire\Home;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/packs', [PackController::class, 'index'])->name('packs.index');
    Route::get('show/{post}', [ShowController::class, 'show'])->name('show-post');
    Route::get('showPack/{pack}', [ShowPack::class, 'show'])->name('show-pack');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'admin'
])->group(function () {
    Route::resource('posts', PostController::class);
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('packs', PackController::class);
});

Route::get('/packsPublic', [PackController::class, 'indexPublic'])->name('packsPublic.index');


// PAGO SEGURO
Route::get('/checkout', [PackController::class, 'checkout'])->name('checkout');
Route::post('/session', [PackController::class, 'session'])->name('session');
Route::get('/success', [PackController::class, 'success'])->name('success');

// MAILABLE
Route::get('contactanos', [ContactanosController::class, 'pintarFormulario'])->name('contactanos.index');
Route::post('contactanos', [ContactanosController::class, 'procesarFormulario'])->name('contactanos.procesar');
