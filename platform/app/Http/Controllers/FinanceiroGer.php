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
        DB::table('associados')
            ->join('registro_ponto', 'associados.id','=','registro_ponto.associado')
            ->join('registro_escala', 'associados.id','=','registro_escalao.associado')
            ->get();


            /**->join('associados', 'registro_escala.associado','=', 'associados.id')
                ->join('locais', 'registro_escala.local','=','locais.id')
                ->join('equipes', 'registro_escala.equipe','=','equipes.id')
                ->select('registro_escala.data_escala','associados.nome as associadoNome','locais.nome as localNome','equipes.nome as equipeNome','equipes.cor')//
                ->get(); */
        return true;
    }
    
}
