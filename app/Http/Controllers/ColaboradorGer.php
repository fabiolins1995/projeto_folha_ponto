<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

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
        //instancia do banco para salvamento
        //DB::insert('insert into _____ (nomeColaborador, enderecoColaborador, equipeColaborador, funcaoColaborador) values (?, ?, ?, ?)', [$nomeColaborador, $enderecoColaborador, $equipeColaborador, $funcaoColaborador]);
        $nomeColaborador = $request->input('nomeColaborador');
        $enderecoColaborador = $request->input('enderecoColaborador');
        $equipeColaborador = $request->input('equipeColaborador');
        $funcaoColaborador = $request->input('funcaoColaborador');
        
        return true;
    }
        
    public function listarColaboradores()
    {
         //instancia do banco para listar equipes
         //DB::select('select * from ____ ')
        return true;
    }
    
}
