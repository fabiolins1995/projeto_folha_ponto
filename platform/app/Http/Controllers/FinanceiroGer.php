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
        return DB::table('associados')
            ->join('registro_escala', 'associados.id','=','registro_escala.associado')
            ->join('equipes', 'registro_escala.equipe','=','equipes.id')
            ->select(
                'associados.id as id',
                'associados.nome as nomeAssociado',
                'equipes.nome as nomeEquipe',
                'associados.banco as bancoAssociado',
                'associados.numero_agencia as agenciaAssociados',
                'associados.numero_conta as contaAssociados',
                'associados.chave_pix as chaveAssociado'
                )
            ->distinct('id')
            ->get();
    }

    public function listarFinanceiroEscala(Request $request)
    {
        return DB::table('associados')
            ->join('registro_escala', 'associados.id','=','registro_escala.associado')
            ->where('associados.id',$request->input('id'))
            ->whereMonth('registro_escala.horario_escala_entrada','=',$request->input('mes'))
            ->whereYear('registro_escala.horario_escala_entrada','=',$request->input('ano'))
            ->select(
                'associados.id as id',
                DB::raw("SEC_TO_TIME(SUM(TIME_TO_SEC(-TIMEDIFF(registro_escala.horario_escala_entrada,registro_escala.horario_escala_saida)))) as Total"))
            ->groupBy('id')
            ->get();
    }

    public function listarFinanceiroHoras(Request $request)
    {
        return DB::table('registro_escala')
            ->join('registro_ponto','registro_escala.id','=','registro_ponto.id_escala')
            ->where('registro_ponto.presenca','1')
            ->where('registro_escala.associado',$request->input('id'))
            ->whereMonth('registro_escala.horario_escala_entrada','=',$request->input('mes'))
            ->whereYear('registro_escala.horario_escala_entrada','=',$request->input('ano'))
            ->select(
                'registro_escala.associado as id',
                DB::raw("SEC_TO_TIME(SUM(TIME_TO_SEC(-TIMEDIFF(registro_escala.horario_escala_entrada,registro_escala.horario_escala_saida)))) as Total"))
            ->groupBy('id')
            ->get();
    }

    public function listarFinanceiroExtras(Request $request)
    {
        return DB::table('registro_extra')
            ->join('registro_escala','registro_extra.id_escala','=','registro_escala.id')
            ->join('registro_ponto','registro_escala.id','=','registro_ponto.id_escala')
            ->where('registro_ponto.presenca','1')
            ->where('registro_escala.associado',$request->input('id'))
            ->whereMonth('registro_escala.horario_escala_entrada','=',$request->input('mes'))
            ->whereYear('registro_escala.horario_escala_entrada','=',$request->input('ano'))
            ->select(
                'registro_escala.associado as id',
                DB::raw("SUM(registro_extra.hora)"))
            ->groupBy('id')
            ->get();
    }
    
}
