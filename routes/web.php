<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', function () {
    return redirect()->route('login');
})->name('inicio');

Route::get('/agenda', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/load-events', [App\Http\Controllers\EventController::class, 'loadEvents'])->name('routeLoadEvents');
Route::get('/load-contas', [App\Http\Controllers\EventController::class, 'loadContas'])->name('routeLoadContas');
Route::delete('/event-delete', [App\Http\Controllers\EventController::class, 'destroy'])->name('routeEventDelete');

Route::post('/event-store', [App\Http\Controllers\EventController::class, 'store'])->name('routeEventStore');
Route::put('/event-update', [App\Http\Controllers\EventController::class, 'update'])->name('routeEventUpdate');

Route::get('financeiro/{financeiro}/replica', [\App\Http\Controllers\ContasController::class, 'replica'])->name('financeiro.replica');
Route::get('financeiro/saldoanterior', [\App\Http\Controllers\ContasController::class, 'month'])->name('financeiro.month');
Route::resource('financeiro', App\Http\Controllers\ContasController::class)->except('show');

Route::resource('relatorio', App\Http\Controllers\RelatorioController::class)->except('show');

Route::resource('funcionario', App\Http\Controllers\FuncionariosController::class)->except('show');
Route::get('categoria', [App\Http\Controllers\CategoriaController::class, 'index'])->name('categoria.index');
Route::post('categoria', [App\Http\Controllers\CategoriaController::class, 'store'])->name('categoria.store');
Route::delete('categoria', [App\Http\Controllers\CategoriaController::class, 'destroy'])->name('categoria.delete');
Route::put('categoria/update', [App\Http\Controllers\CategoriaController::class, 'update'])->name('categoria.update');

Route::get('cartaodecredito', [App\Http\Controllers\CartaoDeCreditoController::class, 'index'])->name('cartaodecredito.index');
Route::post('cartaodecredito', [App\Http\Controllers\CartaoDeCreditoController::class, 'store'])->name('cartaodecredito.store');
Route::delete('cartaodecredito', [App\Http\Controllers\CartaoDeCreditoController::class, 'destroy'])->name('cartaodecredito.delete');
Route::put('cartaodecredito/update', [App\Http\Controllers\CartaoDeCreditoController::class, 'update'])->name('cartaodecredito.update');

Route::get('contabancaria', [App\Http\Controllers\ContaBancariaController::class, 'index'])->name('contabancaria.index');
Route::post('contabancaria', [App\Http\Controllers\ContaBancariaController::class, 'store'])->name('contabancaria.store');
Route::delete('contabancaria', [App\Http\Controllers\ContaBancariaController::class, 'destroy'])->name('contabancaria.delete');
Route::put('contabancaria/update', [App\Http\Controllers\ContaBancariaController::class, 'update'])->name('contabancaria.update');

Route::get('formasdepagamento', [App\Http\Controllers\FormaDePagamentoController::class, 'index'])->name('formasdepagamento.index');
Route::post('formasdepagamento', [App\Http\Controllers\FormaDePagamentoController::class, 'store'])->name('formasdepagamento.store');
Route::delete('formasdepagamento', [App\Http\Controllers\FormaDePagamentoController::class, 'destroy'])->name('formasdepagamento.delete');
Route::put('formasdepagamento/update', [App\Http\Controllers\FormaDePagamentoController::class, 'update'])->name('formasdepagamento.update');

Route::get('clienteoufornecedor', [App\Http\Controllers\ClienteOuFornecedorController::class, 'index'])->name('clienteoufornecedor.index');
Route::post('clienteoufornecedor', [App\Http\Controllers\ClienteOuFornecedorController::class, 'store'])->name('clienteoufornecedor.store');
Route::delete('clienteoufornecedor', [App\Http\Controllers\ClienteOuFornecedorController::class, 'destroy'])->name('clienteoufornecedor.delete');
Route::put('clienteoufornecedor/update', [App\Http\Controllers\ClienteOuFornecedorController::class, 'update'])->name('clienteoufornecedor.update');

Route::get('relatorio', [App\Http\Controllers\RelatorioController::class, 'index'])->name('relatorio.index');
Route::post('relatorio', [App\Http\Controllers\RelatorioController::class, 'store'])->name('relatorio.store');
Route::delete('relatorio', [App\Http\Controllers\RelatorioController::class, 'destroy'])->name('relatorio.delete');
Route::put('relatorio/update', [App\Http\Controllers\RelatorioController::class, 'update'])->name('relatorio.update');

