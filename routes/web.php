<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CasillaController;
use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\EleccionController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\EleccioncomiteController;
use App\Http\Controllers\VotoController;
use App\Http\Controllers\FuncionariocasillaController;
use App\Http\Controllers\ImeiautorizadoController;
use App\Http\Controllers\VotocandidatoController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('votocandidato/chart', [VotocandidatoController::class, 'generatechart']);

Route::get('casilla/pdf', [CasillaController::class, 'generatepdf']);
Route::get('candidato/pdf', [CandidatoController::class, 'generatepdf']);
Route::get('rol/pdf', [RolController::class, 'generatepdf']);
Route::get('eleccion/pdf', [EleccionController::class, 'generatepdf']);
Route::get('funcionario/pdf', [FuncionarioController::class, 'generatepdf']);
Route::get('eleccioncomite/pdf', [EleccioncomiteController::class, 'generatepdf']);
Route::get('funcionariocasilla/pdf', [FuncionariocasillaController::class, 'generatepdf']);
Route::get('imeiautorizado/pdf', [ImeiautorizadoController::class, 'generatepdf']);
Route::get('voto/pdf', [VotoController::class, 'generatepdf']);
Route::get('votocandidato/pdf', [VotocandidatoController::class, 'generatepdf']);

Route::resource('casilla', CasillaController::class);
Route::resource('candidato', CandidatoController::class);
Route::resource('funcionario', FuncionarioController::class);
Route::resource('eleccion', EleccionController::class);
Route::resource('rol', RolController::class);
Route::resource('eleccioncomite', EleccioncomiteController::class);
Route::resource('voto', VotoController::class);
Route::resource('funcionariocasilla', FuncionarioCasillaController::class);
Route::resource('imeiautorizado', ImeiautorizadoController::class);
Route::resource('votocandidato', VotocandidatoController::class);