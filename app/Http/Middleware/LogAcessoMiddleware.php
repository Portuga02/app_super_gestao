<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\LogAcesso;

class LogAcessoMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        try {



            $ipAcessor = $request->server->get('REMOTE_ADDR');
            $rotaQueAcessou = $request->getRequestUri();
            LogAcesso::create(['log' => "O ip [$ipAcessor] Mandando dados $rotaQueAcessou"]);

            return $next($request);  // empurra a requisição para frente



        } catch (\Throwable $th) {
            throw $th;

        }

    }



}
