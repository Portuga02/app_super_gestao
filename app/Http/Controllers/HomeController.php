<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MotivoContato;

class HomeController extends Controller
{
    public function Home()
    {
        $motivo_contatos = MotivoContato::all();

        return view('site.home', ['tituloHome' => 'Home', 'motivo_contatos' => $motivo_contatos]);
    }
}
