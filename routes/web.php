<?php

use App\Http\Controllers\CasillaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\EleccionController;
use App\Http\Controllers\votoController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PDFController;

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
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::get('casilla/pdf', [CasillaController::class,'generatePDF'])->name('generatePDF');
Route::get('download',[PDFController::class, 'download'])->name('download');
Route::get('preview', [PDFController::class, 'preview'])->name('preview');
Route::resource('casilla', CasillaController::class);
Route::resource('candidato', CandidatoController::class);
Route::resource('eleccion', EleccionController::class);
Route::resource('voto', votoController::class);
Route::resource('funcionario', FuncionarioController::class);
Route::get('login/facebook', [LoginController::class, 'redirectToFacebookProvider']);
Route::get('login/facebook/callback', [LoginController::class,'handleProviderFacebookCallback']);
Route::get('logout',[LoginController::class, 'logout'])->name('logout');
Route::get('generate-pdf', [PDFController::class, 'generatePDF']);
Route::middleware(['auth'])->group(function() {
});
