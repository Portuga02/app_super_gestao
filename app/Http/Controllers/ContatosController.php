<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatosController extends Controller
{
    public function contatos()
    {
        return view('site.contato');
    }
}
