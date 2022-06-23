<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatosController extends Controller
{
    public function contatos(Request $request)
    {

        return view('site.contato', ['tituloContato' => 'Contato']);

    }
}
