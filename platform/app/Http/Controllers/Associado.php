<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Exception;

class Associado extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function listaPonto()
    {
        try {
            $idAtivo =  DB::table('associados')->where('email', Auth::user()->email)->select('associados.id')->first();
            return DB::table('registro_ponto')
                ->join('associados', 'registro_ponto.associado', '=', 'associados.id')
                ->join('locais', 'registro_ponto.local', '=', 'locais.id')
                ->join('equipes', 'registro_ponto.equipe', '=', 'equipes.id')
                ->where('registro_ponto.associado', $idAtivo->id)
                ->select('registro_ponto.horario_registro', 'associados.nome as associadoNome', 'locais.nome as localNome', 'equipes.nome as equipeNome', 'equipes.cor') //
                ->get();
        } catch (Exception $e) {
            return false;
        }
    }

    public function listaEscala()
    {
        try {
            $idAtivo =  DB::table('associados')->where('email', Auth::user()->email)->select('associados.id')->first();
            return DB::table('registro_escala')
                ->join('associados', 'registro_escala.associado', '=', 'associados.id')
                ->join('locais', 'registro_escala.local', '=', 'locais.id')
                ->join('equipes', 'registro_escala.equipe', '=', 'equipes.id')
                ->where('registro_escala.associado', $idAtivo->id)
                ->select('registro_escala.horario_escala_entrada as entrada','registro_escala.horario_escala_saida as saida', 'associados.nome as associadoNome', 'locais.nome as localNome', 'equipes.nome as equipeNome', 'equipes.cor') //
                ->get();
        } catch (Exception $e) {
            return false;
        }
    }
}
