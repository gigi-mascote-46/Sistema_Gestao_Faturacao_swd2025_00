<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaturasController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;


// Rotas públicas
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');

// Rotas de autenticação (mantidas do auth.php)
require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});

// Rotas protegidas
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Perfil do usuário
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // Clientes (com soft delete)
    Route::resource('clientes', ClienteController::class);
    Route::prefix('clientes')->group(function () {
        Route::get('trashed', [ClienteController::class, 'trashed'])->name('clientes.trashed');
        Route::patch('{id}/restore', [ClienteController::class, 'restore'])->name('clientes.restore');
        Route::delete('{id}/force-delete', [ClienteController::class, 'forceDelete'])->name('clientes.forceDelete');
    });

    // Faturas
    Route::resource('faturas', FaturasController::class);

    // Fornecedores
    Route::resource('fornecedores', FornecedorController::class);

    // Users (admin only)
    Route::middleware(['auth', 'check.admin'])->group(function () {
        Route::resource('users', UsersController::class);
    });
});

// Route::get('/exemplo',[ClienteController::class,'exemplo'])->name('clientes.exemplo');
Route::get('/clientes/exemplo_template', [ClienteController::class, 'exemploTemplate'])->name('clientes.exemplo_template');
