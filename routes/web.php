<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RevisorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//ROTTA HOME
Route::get('/', [PublicController::class, 'home'])->name('home');

//Middleware
Route::middleware(['auth'])->group(function(){
//Nuovo prodotto
Route::get('/nuovo/prodotto', [ProductController::class, 'CreateProduct'])->name('products.create');

//Rotta per chiedere di diventare revisore
Route::post('/richiesta/revisore',[RevisorController::class, 'becomeRevisor'])->name('become.revisor');

Route::get('/categoria/{category}', [ProductController::class, 'categoryShow'])->name('category.show');

});


Route::get('/dettaglio/prodotto/{product}', [ProductController::class, 'showProducts'])->name('products.show');

Route::get('/tutti/prodotti', [ProductController::class, 'indexProducts'])->name('products.index');


//Home revisore
Route::get('/revisor/home', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');

//Accetta Prodotto
Route::patch('/accetta/prodotto/{product}', [RevisorController::class, 'acceptProduct'])->middleware('isRevisor')->name('revisor.accept_product');

//Rifiuta Prodotto
Route::patch('/rifiuta/prodotto/{product}', [RevisorController::class, 'rejectProduct'])->middleware('isRevisor')->name('revisor.reject_product');

// Reset Product
Route::patch('/reset/prodotto/{product}', [RevisorController::class, 'resetProduct'])->middleware('isRevisor')->name('revisor.reset_product');

//rendi l'utente revisore
Route::get('/rendi/revisore/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');

//ricerca prodotto
Route::get('/ricerca/prodotto', [PublicController::class, 'searchProducts'])->name('products.search');

//rotta per vista lavora con noi
Route::get('/ricerca/lavoro/', [RevisorController::class, 'becomeWorker'])->name('become.worker');

Route::get('/revisiona/prodotto/{product}',[RevisorController::class, 'reviseProduct'])->name('revisor.product');

Route::post('/lingua/{lang}', [PublicController::class, 'setLanguage'])->name('set_language_locale');

Route::get('/contact-team', [PublicController::class, 'contactTeam'])->name('contact-team');