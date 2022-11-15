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

        if (!empty($request)) {
            $request->validate(
                $regras =  [
                    'nome' => 'required|min:3|max:40',
                    'telefone' => 'required',
                    'email' => 'required|email|unique:site_contatos',
                    'motivo_contatos_id' => 'required',
                    'mensagem' => 'required|max:2000'

                ],
                $feedback =  [
                    'nome.required' => 'O campo nome precisa ser preenchido.',
                    'nome.min' => 'O campo nome precisa ter no minimo três caracteres',
                    'nome.max' => 'o campo nome tem que ter no maximo quarenta caracteres',
                    'telefone.required' => 'É necessário um endereço de email valido para retorno',
                    'email.required' => 'o campo email precisa ser preenchido',
                    'motivo_contatos_id.required' => 'É necessário um motivo para o contato ',
                    'mensagem.required' => 'É necessario uma mensagem para o contato conosco',
                    'mensagem.max' => 'deve ter no maximo 2000 caracteres'
                ],
                // para valores default 
                ['required' => 'campo :atribute deve ser preechido']
            );
            $request->validate($regras, $feedback);
            SiteContato::create($request->all());
            return redirect()->route('site.Home');
        } else {
            return 'error';
        }
    }
}
