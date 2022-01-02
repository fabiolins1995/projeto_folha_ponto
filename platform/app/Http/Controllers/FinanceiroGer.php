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
        DB::table('associados')->get();
        return true;
    }
    
}
