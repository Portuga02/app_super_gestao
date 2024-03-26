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
            

            if($ifAcessor  <> $ifAcessor !== null) {
                $ipAcessor = $request->server->get('REMOTE_ADDR');
                $rotaQueAcessou = $request->getRequestUri();
                LogAcesso::create(['log' => "O ip [$ipAcessor] Mandando dados $rotaQueAcessou"]);
            } else{
                return Response('Chegamos na Middleware');
            }


        } catch (\Throwable $th) {
           throw $th;

        }
        
       }

        // return $next($request);  // empurra a requisição para frente

    }
}
