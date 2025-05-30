<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class CheckRole
{
    /**
     * Espera un parámetro: el nombre del rol que debe tener el usuario.
     */
    public function handle(Request $request, Closure $next, string $roles)
    {
        $user = $request->user();

        // 1) Dividir la lista de roles: soporta comas o pipes
        $allowed = preg_split('/[,\|]/', $roles, flags: PREG_SPLIT_NO_EMPTY);

        // 2) Verificar si el usuario tiene AL MENOS uno
        foreach ($allowed as $role) {
            if ($user && $user->hasRole(trim($role))) {
                return $next($request);
            }
        }

        abort(403, 'No tienes permiso para acceder a esta página.');
    }
}