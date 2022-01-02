<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Exception;

class equipesGer extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function gerenciamentoequipes()
    {
        return view('gerenciamentoequipes');
    }
    
    public function salvarEquipe(Request $request)
    {
        try{
            $nomeEquipe = $request->input('nomeEquipe');
            $corEquipe = $request->input('corEquipe');

            DB::table('equipes')->insert(['nome'=>$nomeEquipe, 'cor'=>$corEquipe]);

            return view('gerenciamentoequipes');
       }catch(Exception $e){
             return response()->view('errors.invalid-order', [], 500);
       }
    }
        
    public function listarEquipes()
    {
         //instancia do banco para listar equipes
         return DB::table('equipes')->get();
    }
    
    public function deletarEquipe(Request $request)
    {
         //instancia do banco para listar equipes
         try{
             DB::table('equipes')->where('id', '=', $request->query('id'))->delete();
             return true;
         }catch(Exception $e){
             return false;
         }

    }

    public function editarEquipe(Request $request)
    {
        try{
            $nomeEquipe = $request->input('nomeEquipe');
            $corEquipe = $request->input('corEquipe');
            $idEquipe = $request->input('idEquipe');

            DB::table('equipes')->where('id', $idEquipe)->update(['nome' => $nomeEquipe,'cor'=>$corEquipe]);

            return view('gerenciamentoequipes');

        }catch(Exception $e){
            return $e;
        }   
    }

    public function listaEquipe(Request $request)
    {
        try{
            return DB::table('equipes')->where('id', $request->input('id'))->get();
        }catch(Exception $e){
            return false;
        }
    }
    

}

