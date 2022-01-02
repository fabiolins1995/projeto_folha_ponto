<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class dashboard extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashadmin()
    {
        if(Auth::user()->tipo == 1){ 
            return view('dashadmin');
        }
    }
    public function dashclientes()
    {
        if(Auth::user()->tipo == 0){     
            return view('dashclientes');
        }
    }
}
