<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function principal()
    {
        echo "Chamando o laravel pela rota principal atualizada";
    }
}
