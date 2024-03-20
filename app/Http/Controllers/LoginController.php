<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Autenticador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function index(){
        return view('login.index');
    }

    public function logar(Request $request){

        if(!Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->back()->withErrors(['Usuário ou senha invalida']);
        }
        
        return to_route('series.index');
    }

    public function deslogar (Request $request){
        Auth::logout();

        return to_route('login.index');
    }
}
