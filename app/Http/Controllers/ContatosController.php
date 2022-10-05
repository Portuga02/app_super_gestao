<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;


class ContatosController extends Controller
{
    public function contatos(Request $request)
    {
        try {
            $motivo_contatos = [
                '1' => 'Dúvida',
                '2' => 'Elogio',
                '3' => 'Reclamação'
            ];
            return view('site.contato', ['tituloContato' => 'Contato', 'motivo_contatos' => $motivo_contatos]);
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
