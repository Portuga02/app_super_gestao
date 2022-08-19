<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;


class ContatosController extends Controller
{
    public function contatos(Request $request)
    {
        try {
            return view('site.contato', ['tituloContato' => 'Contato']);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function salvar(Request $request)
    {

        if (!empty($request)) {
            $request->validate([
                'nome' => 'required',
                'telefone' => 'required',
                'email' => 'required',
                'motivo_contato' => 'required'
            ]);
        }
    }
}
