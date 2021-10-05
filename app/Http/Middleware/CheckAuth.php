<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user() && auth()->user()->id_roles == 1) {
            return redirect()->route('cursos.index');
        }
        if (auth()->user() && auth()->user()->id_roles == 2) {
            return redirect()->route('cursos_aprobados');
        }
        return $next($request, ['name' => 'Alvaro']);
    }
}
