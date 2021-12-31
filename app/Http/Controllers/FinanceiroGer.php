<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

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
         //instancia do banco para listar equipes
         //DB::select('select * from ____ ')
        return true;
    }
    
}
