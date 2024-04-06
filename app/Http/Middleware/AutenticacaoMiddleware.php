<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $metodo_auteticacao, $perfil_acesso)
    {

//
        switch ($metodo_auteticacao) {
            case 'DBASQL':
                echo "O metodo de autenticação".$metodo_auteticaco." padrão para o sistema é o metodo PADRAO DBASQL"."o perfil logado é ".$perfil_acesso;
                break;
            case 'ldap':
                echo 'O metodo de autenticação padrão para o sistema é o metodo PADRAO LDAP';
                break;

            default:
                echo 'O metodo de autenticação padrão para o sistema é o metodo PADRAO X';
                break;
        }

        if($perfil_acesso == 'visitante' || $perfil_acesso == 'convidado') {
            echo "Sera exibido parte do sistema para visitantes com acessos apenas para a modalidade";
        } else {
            echo "Carregar perfil completo";
        }
        if(true) {
            return $next($request);
        } else {
            return Response('Acesso negado , passando pela middleware do sismtema novo');
        }

    }
}
