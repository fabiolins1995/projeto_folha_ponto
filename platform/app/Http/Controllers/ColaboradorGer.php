<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Exception;

class colaboradorGer extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function colaborador()
    {
        if(Auth::user()->tipo == 1){ 
            return view('colaborador');
        }
    }

    public function salvarColaborador(Request $request)
    {
        try{
            $banco = $request->input('banco');
            $chave_pix = $request->input('chave_pix');
            $cpf = $request->input('cpf');
            $email = $request->input('email');
            $especialidade = $request->input('especialidade');
            $funcao = $request->input('funcao');
            $local = $request->input('local');
            $nome = $request->input('nome');
            $numero_agencia = $request->input('numero_agencia');
            $numero_conta = $request->input('numero_conta');
            $setor = $request->input('setor');
            $telefone = $request->input('telefone');
            $tipo_de_conta = $request->input('tipo_de_conta');

            DB::table('associados')->insert([
                'banco' => $banco, 
                'chave_pix' => $chave_pix,
                'cpf' => $cpf,
                'email' => $email,
                'especialidade' => $especialidade,
                'funcao' => $funcao,
                'local' => $local,
                'nome' => $nome,
                'numero_agencia' => $numero_agencia,
                'numero_conta' => $numero_conta,
                'setor' => $setor,
                'telefone' => $telefone,
                'tipo_de_conta' => $tipo_de_conta,
            ]);

            return view('colaborador');
        }catch(Exception $e){
            return $e;
        }
    }
    
    public function editarColaborador(Request $request){
        try{
            $banco = $request->input('banco');
            $chave_pix = $request->input('chave_pix');
            $cpf = $request->input('cpf');
            $email = $request->input('email');
            $especialidade = $request->input('especialidade');
            $funcao = $request->input('funcao');
            $local = $request->input('local');
            $nome = $request->input('nome');
            $numero_agencia = $request->input('numero_agencia');
            $numero_conta = $request->input('numero_conta');
            $setor = $request->input('setor');
            $telefone = $request->input('telefone');
            $tipo_de_conta = $request->input('tipo_de_conta');

            DB::table('associados')->where('id', $request->input('id'))->update([
                'banco' => $banco, 
                'chave_pix' => $chave_pix,
                'cpf' => $cpf,
                'email' => $email,
                'especialidade' => $especialidade,
                'funcao' => $funcao,
                'local' => $local,
                'nome' => $nome,
                'numero_agencia' => $numero_agencia,
                'numero_conta' => $numero_conta,
                'setor' => $setor,
                'telefone' => $telefone,
                'tipo_de_conta' => $tipo_de_conta,
            ]);

            return view('colaborador');
        }catch(Exception $e){
            return $e;
        }
    }
    
    public function listarColaboradores()
    {
        return DB::table('associados')->get();
    }
    
    public function deletarColaborador(Request $request)
    {
        try{
            DB::table('associados')->where('id', '=', $request->query('id'))->delete();
            return true;
        }catch(Exception $e){
            return false;
        }
    }

    public function listaColaborador(Request $request)
    {
        try{
            return DB::table('associados')->where('id',$request->input('id'))->get();
        }catch(Exception $e){
            return false;
        }
    }
    
}
