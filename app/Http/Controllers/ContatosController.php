<?php

namespace App\Http\Controllers;

use App\Models\MotivoContato;
use Illuminate\Http\Request;
use App\Models\SiteContato;

use Symfony\Component\HttpFoundation\Response;

class ContatosController extends Controller
{
    public function contatos(Request $request)
    {
        try {
            $motivo_contatos = MotivoContato::all();
            return view('site.contato', ['tituloContato' => 'Contato', 'motivo_contatos' => $motivo_contatos]);
        } catch (\Exception $e) {
            return response()->json([
                'info' => 'error',

                'error' => $e->getMessage(),
                'Linha' => $e->getLine(),
                'Arquivo' => $e->getFile()
            ], Response::HTTP_BAD_REQUEST);
        }
    }
    public function salvar(Request $request)
    {
        try {
            if (!empty($request)) {
                $request->validate([
                    'nome' => 'required|min:3|max:40',
                    'telefone' => 'required',
                    'email' => 'email',
                    'motivo_contatos_id' => 'required',
                    'mensagem' => 'required|max:2000'

                ]);
                SiteContato::create($request->all());
                return redirect()->route('site.Home');
            }
        } catch (\Exception $e) {
            return response()->json([
                'info' => 'error',
                'error' => $e->getMessage(),
                'Linha' => $e->getLine(),
                'Arquivo' => $e->getFile()
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
