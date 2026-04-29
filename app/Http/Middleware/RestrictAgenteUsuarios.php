<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RestrictAgenteUsuarios
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if ($user && $user->rol && $user->rol->nombre === 'agente') {
            return redirect()
                ->route('casas.index')
                ->with('error', 'Acceso restringido: no puedes administrar usuarios.');
        }

        return $next($request);
    }
}
