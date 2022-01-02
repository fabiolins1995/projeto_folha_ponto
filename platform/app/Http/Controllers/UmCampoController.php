<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Exception;

class umCampo extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Lista de cadastro para banco um campo
     */
    public function cadastraBanco(Request $request){
        try{
            DB::table('bancos')->insert(['nome' => $request->input('nome')]);
            return true;
        }catch(Exception $e){
            return false;
        }
    }
    public function cadastraFuncao(Request $request){
        try{
            DB::table('funcoes')->insert(['nome' => $request->input('nome')]);
            return true;
        }catch(Exception $e){
            return false;
        }
    }
    public function cadastraLocal(Request $request){
        try{
            DB::table('locais')->insert(['nome' => $request->input('nome')]);
            return true;
        }catch(Exception $e){
            return false;
        }
    }
    public function cadastraSetor(Request $request){
        try{
            DB::table('setores')->insert(['nome' => $request->input('nome')]);
            return true;
        }catch(Exception $e){
            return false;
        }
    }
    public function cadastraEspecialidade(Request $request){
        try{
            DB::table('especialidades')->insert(['nome' => $request->input('nome')]);
            return true;
        }catch(Exception $e){
            return false;
        }
    }
    /**
     * Lista de listagens para banco um banco
     */
    public function listarBancos(Request $request){
        try{
            return DB::table('bancos')->get();
        }catch(Exception $e){
            return false;
        }
    }
    public function listarFuncoes(Request $request){
        try{
            return DB::table('funcoes')->get();
        }catch(Exception $e){
            return false;
        }
    }
    public function listarLocais(Request $request){
        try{
            return DB::table('locais')->get();
        }catch(Exception $e){
            return false;
        }
    }
    public function listarSetores(Request $request){
        try{
            return DB::table('setores')->get();
        }catch(Exception $e){
            return false;
        }
    }
    public function listarEspecialidades(Request $request){
        try{
            return DB::table('especialidades')->get();
        }catch(Exception $e){
            return false;
        }
    }
}
