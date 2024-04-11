<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, $rol)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();
        
        // Aquí podrías implementar la lógica para verificar los roles del usuario
        // Por ejemplo, podrías tener un campo 'role' en tu tabla 'users' y verificarlo aquí
        if ($user->rol !== $rol) {
            // El usuario no tiene el rol necesario, redirigir a alguna página de error o página principal
            abort(403, 'No tienes permiso para acceder a esta página.');
        }

        return $next($request);
    }
}
