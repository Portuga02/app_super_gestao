<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use Exception;

class ContatosController extends Controller
{
    public function contatos(Request $request)
    {
        try {
            $contato = new SiteContato();
            $contato->create($request->all());
            return view('site.contato', ['tituloContato' => 'Contato']);
        } catch (\Throwable $e) {
            return response()->json([
                'info' => 'error',
                'result' => 'It was not possible to get data.',
                'error' => $e->getMessage() . $e->getLine(),
            ], 400);
        }
    }
}
