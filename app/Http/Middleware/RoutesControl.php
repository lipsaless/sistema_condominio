<?php

namespace App\Http\Middleware;

use Closure;

class RoutesControl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $arrayPortaria = [
            'sistema',
            'sistema/visitante',
            'sistema/reserva',
            'sistema/reserva-local',
            'sistema/morador',
            'sistema/lista-morador'
        ];

        $arrayAdm = [
            'sistema',
            'sistema/visitante',
            'sistema/reserva',
            'sistema/reserva-local',
            'sistema/morador',
            'sistema/funcionario',
            'sistema/configuracoes',
            'sistema/lista-morador'
        ];

        $url = explode('/', $request->route()->uri());
        $urlTratada = $url[0];

        if (isset($url[1])) {
            $urlTratada .= '/'.$url[1];
        }

        $perfil = isPortaria() ? $arrayPortaria : $arrayAdm;

        $msg = 'Este perfil não tem acesso à esta rota';

        if (!in_array($urlTratada, $perfil)) {
            return redirect('sistema')->with('msg', [$msg]);
        }

        return $next($request);
    }
}
