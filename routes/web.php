<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactanosController;
use App\Http\Controllers\PackController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\Socialite\GoogleController;
use App\Livewire\Home;
use App\Mail\ContactanosMailable;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', Home::class)->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('show/{post}', [ShowController::class, 'show'])->name('show-post');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'admin'
])->group(function () {
    Route::resource('posts', PostController::class)->except('show');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('packs', PackController::class);
});



//PAGO SEGURO
Route::get('/checkout', 'App\Http\Controllers\PackController@checkout')->name('checkout');
Route::post('/session', 'App\Http\Controllers\PackController@session')->name('session');
Route::get('/success', 'App\Http\Controllers\PackController@success')->name('success');

//MAILABLE
Route::get('contactanos', [ContactanosController::class, 'pintarFormulario'])->name('contactanos.index');
Route::post('contactanos', [ContactanosController::class, 'procesarFormulario'])->name('contactanos.procesar');

//Google
Route::get('/auth/google/redirect', [GoogleController::class, 'redirect'])->name('google.redirect');
Route::get('/auth/google/callback', [GoogleController::class, 'callback'])->name('google.callback');
