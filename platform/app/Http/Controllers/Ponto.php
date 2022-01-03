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
    public function falta()
    {
        if(Auth::user()->tipo == 1){ 
            return view('falta');
        }
    }
    public function horaextra()
    {
        if(Auth::user()->tipo == 1){ 
            return view('horaextra');
        }
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
                ->select('registro_escala.horario_escala_entrada as entrada','registro_escala.horario_escala_saida as saida','associados.nome as associadoNome','locais.nome as localNome','equipes.nome as equipeNome','equipes.cor')//
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
            $escala = DB::table('registro_escala')->insertGetId([
                'associado' => $request->input('nome'), 
                'local' => $request->input('local'),
                'equipe' => $request->input('equipe'),
                'data_escala' => $request->input('dataEntrada'),
                'horario_escala_entrada' => $request->input('dataEntrada'),
                'horario_escala_saida' => $request->input('dataSaida'),
            ]);
            DB::table('registro_ponto')->insert([
                'id_escala' => $escala,
                'presenca' => 1
            ]);
            return view('dashadmin');
        }
        catch(Exception $e)
        {
            return false;
        }
    }
    public function listarDatas(Request $request)
    {
        return DB::table('registro_escala')
            ->join('registro_ponto','registro_escala.id','registro_ponto.id_escala')
            ->where('registro_ponto.presenca','1')
            ->where('registro_escala.associado',$request->input('id'))
            ->select('registro_escala.id as id','registro_escala.horario_escala_entrada as horario_escala_entrada')
            ->get();
    }

    public function registrarFalta(Request $request)
    {
        DB::table('registro_ponto')
        ->where('registro_ponto.id_escala',$request->input('data'))
        ->update([
            'presenca' => '0',
            'observacao' => $request->input('obs')
        ]);
        return view('falta');    
    }

    public function registrarHoraExtra(Request $request)
    {
        DB::table('registro_extra')->insert([
            'id_escala' => $request->input('data'),
            'hora' => $request->input('hora'),
            'observacao' => $request->input('obs')
        ]);
        return view('horaextra');    
    }
}
