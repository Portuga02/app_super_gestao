<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('site.login', ['titulo' => 'login']);
    }

    public function autenticar(Request $request)
    {
        $regras = ['usuario' => 'email',
        'senha' => 'required'];

        $feedback = ['usuario.email'=>'O campo de usuário (email)  ´obrigatorio',
        'senha.required'=> 'o campo senha é obrigatório'];

    }
}
