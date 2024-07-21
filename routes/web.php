<?php

use App\Http\Controllers\Auth\ProviderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TokenController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'get'])->name('dashboard');
    
    Route::get('/newlink', [DashboardController::class, 'newlink'])->name('newlink');
    Route::post('/newlink', [DashboardController::class, 'webStore'])->name('web-links.store');


    Route::get('/tokens', [TokenController::class, 'get'])->name('tokens');

    Route::post('/tokens/create', [TokenController::class, 'create'])->name('createToken');

    Route::delete('/tokens', [TokenController::class, 'deleteAll'])->name('delAllTokens');

    Route::delete('/tokens/{id}', [TokenController::class, 'deleteOne'])->name('delToken');
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// sociallite stuff
Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect'])->name('auth.provider.redirect');
Route::get('/auth/{provider}/callback', [ProviderController::class, 'callback'])->name('auth.provider.callback');

require __DIR__ . '/auth.php';



Route::get('/{url}', [LinkController::class, 'get'])->name('redirect');
