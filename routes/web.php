<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashadmin', [App\Http\Controllers\Dashboard::class, 'dashadmin'])->name('dash admin');

Route::get('/dashclientes', [App\Http\Controllers\Dashboard::class, 'dashclientes'])->name('dash clientes');

//Equipes
Route::get('/gerenciamentoequipes', [App\Http\Controllers\EquipesGer::class, 'gerenciamentoequipes'])->name('gerenciamentoequipes');
Route::post('/salvarEquipe',[App\http\Controllers\EquipesGer::class, 'salvarEquipe'])->name('salvarEquipe');
Route::post('/editarEquipe',[App\http\Controllers\EquipesGer::class, 'editarEquipe'])->name('editarEquipe');
Route::get('/deletarEquipe',[App\http\Controllers\EquipesGer::class, 'deletarEquipe'])->name('deletarEquipe');
Route::get('/listarEquipes',[App\http\Controllers\EquipesGer::class, 'listarEquipes'])->name('listarEquipes');

//Colaboradores
Route::get('/colaborador', [App\Http\Controllers\ColaboradorGer::class, 'colaborador'])->name('colaborador');
Route::get('/salvarColaborador',[App\http\Controllers\ColaboradorGer::class, 'salvarColaborador'])->name('salvarColaborador');
Route::get('/listarColaboradores',[App\http\Controllers\ColaboradorGer::class, 'listarColaboradores'])->name('listarColaboradores');

//Financeiro
Route::get('/financeiro', [App\Http\Controllers\FinanceiroGer::class, 'financeiro'])->name('financeiro');
Route::get('/listarFinanceiro',[App\http\Controllers\FinanceiroGer::class, 'listarFinanceiro'])->name('listarFinanceiro');
