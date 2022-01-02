<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Exception;

class financeiroGer extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function financeiro()
    {
        if(Auth::user()->tipo == 1){ 
            return view('financeiro');
        }
    }
    public function listarFinanceiro()
    {
        $teste = DB::table('associados')
            ->join('registro_ponto', 'associados.id','=','registro_ponto.associado')
            ->join('registro_escala', 'associados.id','=','registro_escala.associado')
            ->join('equipes', 'registro_ponto.equipe','=','equipes.id')
            ->select(DB::raw("SUM(TIMEDIFF(registro_ponto.horario_registro_entrada,registro_ponto.horario_registro_entrada)) as totalHorasEntrada"))
            ->groupBy('registro_ponto.horario_registro')
            ->get();
        
        return $teste;
    }
    
}
