<?php

namespace App\Http\Middleware;

use Closure;

class CheckEmitente
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
        /*if ((! auth()->user()->emitente_id) &&
            ($request->route()->uri <> 'basico/emitentes/create') &&
            ($request->route()->uri <> 'basico/emitentes')) {

            return redirect()->route('basico.emitentes.create')
                    ->withFlashMessage('Finalize o cadastro do emitente ou vincule uma empresa emitente a esse usuário.!');
        }*/
        return $next($request);
    }
}
