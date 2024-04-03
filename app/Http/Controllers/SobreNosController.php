<?php

namespace App\Http\Controllers;

use App\Http\Middleware\LogAcessoMiddleware;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;

class SobreNosController extends Controller
{
    public function __construct()
    {
        $this->middleware(Middleware::class);
    }
    public function sobreNos()
    {
        return view('site.sobre-nos', ['tituloSobreNos' => 'Sobre Nós']);
    }
}
