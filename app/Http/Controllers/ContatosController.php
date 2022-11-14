<?php

namespace App\Http\Controllers;

use App\Models\MotivoContato;
use Illuminate\Http\Request;
use App\Models\SiteContato;


class ContatosController extends Controller
{
    public function contatos(Request $request)
    {
        try {

            $motivo_contatos = MotivoContato::all();
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
            SiteContato::create($request->all());
            return redirect()->route('');
        }
    }
}
