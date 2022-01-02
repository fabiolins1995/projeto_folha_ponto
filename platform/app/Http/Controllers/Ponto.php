<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Exception;

class Ponto extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function listarPontos()
    {
        try
        {
            return DB::table('registro_escala')
                ->join('associados', 'registro_escala.associado','=', 'associados.id')
                ->join('locais', 'registro_escala.local','=','locais.id')
                ->join('equipes', 'registro_escala.equipe','=','equipes.id')
                ->select('registro_escala.horario_escala_entrada','registro_escala.horario_escala_saida','associados.nome as associadoNome','locais.nome as localNome','equipes.nome as equipeNome','equipes.cor')//
                ->get();
        }
        catch(Exception $e){
            return false;
        }
    }

    public function listarEscalas()
    {
        try
        {
            return DB::table('registro_escala')
                ->join('associados', 'registro_escala.associado','=', 'associados.id')
                ->join('locais', 'registro_escala.local','=','locais.id')
                ->join('equipes', 'registro_escala.equipe','=','equipes.id')
                ->select('registro_escala.data_escala','associados.nome as associadoNome','locais.nome as localNome','equipes.nome as equipeNome','equipes.cor')//
                ->get();
        }
        catch(Exception $e){
            return false;
        }
    }

    public function addEscala(Request $request)
    {
        try
        {
            DB::table('registro_escala')->insert([
                'associado' => $request->input('nome'), 
                'local' => $request->input('local'),
                'equipe' => $request->input('equipe'),
                'data_escala' => $request->input('dataEntrada'),
                'horario_escala_entrada' => $request->input('dataEntrada'),
                'horario_escala_saida' => $request->input('dataSaida'),
            ]);
        }
        catch(Exception $e)
        {
            return false;
        }
    }
}
