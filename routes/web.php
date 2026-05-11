<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\DashboardController;

// ==============================================================================
// 1. ÁREA PÚBLICA (Acesso Livre)
// ==============================================================================
Route::view('/','home');
Route::get('/', function () { return view('home'); })->name('home');
Route::view('/quem-somos', 'quem-somos')->name('quem-somos');
Route::view('/midia', 'midia')->name('midia');
Route::view('/galeria', 'galeria')->name('galeria');
Route::view('/contato', 'contato')->name('contato');
Route::get('/loja', [App\Http\Controllers\ShopController::class, 'index'])->name('loja');
Route::get('/produto/{slug}', [App\Http\Controllers\ShopController::class, 'show'])->name('produto.show');
Route::get('/carrinho', [CartController::class, 'index'])->name('carrinho.index');
Route::post('/carrinho/adicionar', [CartController::class, 'add'])->name('cart.add');
Route::post('/carrinho/remover', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/checkout', [App\Http\Controllers\CartController::class, 'checkout'])->name('checkout');
// ==============================================================================
// 2. PONTE DO BREEZE (Redireciona login para a lista de produtos)
// ==============================================================================
Route::get('/dashboard', function () {
    return redirect()->route('admin.products.index');
})->middleware(['auth', 'verified'])->name('dashboard');

// ==============================================================================
// 3. ÁREA ADMINISTRATIVA (Prefixo /admin)
// ==============================================================================
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/produtos', [AdminProductController::class, 'index'])->name('products.index');
    Route::get('/produtos/novo', [AdminProductController::class, 'create'])->name('products.create');
    Route::post('/produtos/salvar', [AdminProductController::class, 'store'])->name('products.store');
    Route::get('/produtos/{id}/editar', [AdminProductController::class, 'edit'])->name('products.edit');
    Route::put('/produtos/{id}', [AdminProductController::class, 'update'])->name('products.update');
    Route::delete('/produtos/{id}', [AdminProductController::class, 'destroy'])->name('products.destroy');
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/produtos', [AdminProductController::class, 'index'])->name('products.index');
    Route::resource('categorias', CategoryController::class)->names('categories');
});

// ==============================================================================
// 4. ROTAS DE PERFIL DO USUÁRIO (Obrigatório estar fora do prefixo admin)
// ==============================================================================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ==============================================================================
// 5. ROTAS DE AUTENTICAÇÃO
// ==============================================================================
require __DIR__.'/auth.php';