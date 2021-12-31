<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

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
            $idEquipe = $request->input('idEquipe');
            DB::table('equipe_heapn')->insert(['id'=>$idEquipe, 'equipe'=>$nomeEquipe]);//cor=>$corEquipe
            return view('gerenciamentoequipes');
       }catch(Exception $e){
             return response()->view('errors.invalid-order', [], 500);
       }
    }
        
    public function listarEquipes()
    {
         //instancia do banco para listar equipes
         return DB::select('select * from equipe_heapn ');
    }
    
    public function deletarEquipe(Request $request)
    {
         //instancia do banco para listar equipes
         try{
             DB::table('equipe_heapn')->where('id', '=', $request->query('id'))->delete();
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
         DB::table('equipe_heapn')->where('id', $idEquipe)->update(['equipe' => $nomeEquipe]);//cor => $corEquipe
         return view('gerenciamentoequipes');
        }catch(Exception $e){
              return response()->view('errors.invalid-order', [], 500);
    }   
    }
    

}

