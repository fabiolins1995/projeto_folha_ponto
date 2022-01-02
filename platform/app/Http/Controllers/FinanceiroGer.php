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
            ->join('registro_escala', 'associados.id','=','registro_escala.associado')
            ->join('equipes', 'registro_escala.equipe','=','equipes.id')
            ->select(
                'associados.id as id',
                'equipes.nome as nomeEquipe',
                'associados.banco as bancoAssociado',
                'associados.numero_agencia as agenciaAssociados',
                'associados.numero_conta as contaAssociados',
                )
            ->distinct('id')
            ->get();
        
        return $teste;
    }

    public function listarFinanceiroEscala()
    {
        $teste = DB::table('associados')
            ->join('registro_escala', 'associados.id','=','registro_escala.associado')
            ->join('equipes', 'registro_escala.equipe','=','equipes.id')
            ->select(
                'associados.id as id',
                DB::raw("SEC_TO_TIME(SUM(TIME_TO_SEC(-TIMEDIFF(registro_escala.horario_escala_entrada,registro_escala.horario_escala_saida)))) as Total"))
            ->groupBy('id')
            ->get();
        
        return $teste;
    }
    
}
