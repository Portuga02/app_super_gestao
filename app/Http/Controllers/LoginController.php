<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('site.login', ['titulo' => 'login']);
    }

    public function autenticar()
    {
        return view('site.login', ['titulo' => 'login']);
    }
}
