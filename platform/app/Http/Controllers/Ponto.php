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
            return DB::table('registro_ponto')
                ->join('associados', 'registro_ponto.associado','=', 'associados.id')
                ->join('locais', 'registro_ponto.local','=','locais.id')
                ->join('equipes', 'registro_ponto.equipe','=','equipes.id')
                ->select('registro_ponto.horario_registro','associados.nome as associadoNome','locais.nome as localNome','equipes.nome as equipeNome','equipes.cor')//
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
}
