<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\umCampo;
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
//Rota primária
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Rota autenticação
Auth::routes();

//Dash
Route::get('/dashadmin', [App\Http\Controllers\Dashboard::class, 'dashadmin'])->name('dash admin');
Route::get('/dashclientes', [App\Http\Controllers\Dashboard::class, 'dashclientes'])->name('dash clientes');

//Associado
Route::get('/teste', [App\Http\Controllers\Associado::class, 'teste'])->name('teste');
Route::get('/listaPonto', [App\Http\Controllers\Associado::class, 'listaPonto'])->name('listaPonto');
Route::get('/listaEscala', [App\Http\Controllers\Associado::class, 'listaEscala'])->name('listaEscala');

//Equipes
Route::get('/gerenciamentoequipes', [App\Http\Controllers\EquipesGer::class, 'gerenciamentoequipes'])->name('gerenciamentoequipes');
Route::post('/salvarEquipe',[App\http\Controllers\EquipesGer::class, 'salvarEquipe'])->name('salvarEquipe');
Route::post('/editarEquipe',[App\http\Controllers\EquipesGer::class, 'editarEquipe'])->name('editarEquipe');
Route::get('/deletarEquipe',[App\http\Controllers\EquipesGer::class, 'deletarEquipe'])->name('deletarEquipe');
Route::get('/listarEquipes',[App\http\Controllers\EquipesGer::class, 'listarEquipes'])->name('listarEquipes');
Route::get('/listaEquipe',[App\http\Controllers\EquipesGer::class, 'listaEquipe'])->name('listaEquipe');

//Colaboradores
Route::get('/colaborador', [App\Http\Controllers\ColaboradorGer::class, 'colaborador'])->name('colaborador');
Route::post('/salvarColaborador',[App\http\Controllers\ColaboradorGer::class, 'salvarColaborador'])->name('salvarColaborador');
Route::get('/listarColaboradores',[App\http\Controllers\ColaboradorGer::class, 'listarColaboradores'])->name('listarColaboradores');
Route::get('/listaColaborador',[App\http\Controllers\ColaboradorGer::class, 'listaColaborador'])->name('listaColaborador');
Route::post('/editarColaborador',[App\http\Controllers\ColaboradorGer::class, 'editarColaborador'])->name('editarColaborador');


//Financeiro
Route::get('/financeiro', [App\Http\Controllers\FinanceiroGer::class, 'financeiro'])->name('financeiro');
Route::get('/listarFinanceiro',[App\http\Controllers\FinanceiroGer::class, 'listarFinanceiro'])->name('listarFinanceiro');
Route::get('/listarFinanceiroEscala',[App\http\Controllers\FinanceiroGer::class, 'listarFinanceiroEscala'])->name('listarFinanceiroEscala');
Route::get('/listarFinanceiroHoras',[App\http\Controllers\FinanceiroGer::class, 'listarFinanceiroHoras'])->name('listarFinanceiroHoras');
Route::get('/listarFinanceiroExtras',[App\http\Controllers\FinanceiroGer::class, 'listarFinanceiroExtras'])->name('listarFinanceiroExtras');

//Ponto
Route::get('/listarPontos', [App\Http\Controllers\Ponto::class, 'listarPontos'])->name('listarPontos');
Route::get('/listarEscalas', [App\Http\Controllers\Ponto::class, 'listarEscalas'])->name('listarEscalas');
Route::get('/falta', [App\Http\Controllers\Ponto::class, 'falta'])->name('falta');
Route::get('/horaextra', [App\Http\Controllers\Ponto::class, 'horaextra'])->name('horaextra');
Route::get('/listarDatas', [App\Http\Controllers\Ponto::class, 'listarDatas'])->name('listarDatas');
Route::post('/registrarFalta', [App\Http\Controllers\Ponto::class, 'registrarFalta'])->name('registrarFalta');
Route::post('/registrarHoraExtra', [App\Http\Controllers\Ponto::class, 'registrarHoraExtra'])->name('registrarHoraExtra');
Route::post('/addEscala', [App\Http\Controllers\Ponto::class, 'addEscala'])->name('addEscala');
//Um campo
//Cadastro
Route::post('/cadastraFuncao', [App\Http\Controllers\nomeCampo::class, 'cadastraFuncao'])->name('cadastraFuncao');
Route::post('/cadastraBanco', [App\Http\Controllers\nomeCampo::class, 'cadastraBanco'])->name('cadastraBanco');
Route::get('/cadastraLocal', [App\Http\Controllers\nomeCampo::class, 'cadastraLocal'])->name('cadastraLocal');
Route::post('/cadastraSetor', [App\Http\Controllers\nomeCampo::class, 'cadastraSetor'])->name('cadastraSetor');
Route::post('/cadastraEspecialidade', [App\Http\Controllers\nomeCampo::class, 'cadastraEspecialidade'])->name('cadastraEspecialidade');

//Listar
Route::get('/listarEspecialidades', [App\Http\Controllers\nomeCampo::class, 'listarEspecialidades'])->name('listarEspecialidades');
Route::get('/listarBancos', [App\Http\Controllers\nomeCampo::class, 'listarBancos'])->name('listarBancos');
Route::get('/listarFuncoes', [App\Http\Controllers\nomeCampo::class, 'listarFuncoes'])->name('listarFuncoes');
Route::get('/listarLocais', [App\Http\Controllers\nomeCampo::class, 'listarLocais'])->name('listarLocais');
Route::get('/listarSetores', [App\Http\Controllers\nomeCampo::class, 'listarSetores'])->name('listarSetores');