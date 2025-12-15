<?php

namespace App\Http\Middleware;

use App\Http\Controllers\ProyectosController;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response {

        // Almacenar la cantidad de proyectos que tenemos en nuestro controlador de proyectos.
        // Para esto, arrayProyectos debe ser público (accesible desde aquí) y se accede a través de la instancia de la clase.
        $cantidad_proyectos = count(ProyectosController::$arrayProyectos) - 1;

        // Comprueba si nuestra petición ha recibo el parámetro, ('id' en este caso) y si es mayor que el número de proyectos.
        if ($request->route()->hasParameter('id') && $request->route()->parameter('id') > $cantidad_proyectos) {
            return redirect('/');
        }

        return $next($request);
    }
}
