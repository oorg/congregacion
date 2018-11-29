<?php

namespace App\Http\Middleware;

use Closure;
use App\Grupo;
use App\User;
use RealRashid\SweetAlert\Facades\Alert;

class CheckUser
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
        //dd($request->integrante->id);
        //dd($request->grupo);
        //dd($grupo);
        $grupo = Grupo::find($request->grupo);
        //dd(\Auth::user()->grupo());
        //dd($grupo->user_id);
        //dd(\Auth::id());

        if (\Auth::id() == 1) {
            return $next($request);
        }
        if (\Auth::id() != $grupo->user_id) {
            //alert()->error('ErrorAlert', 'Lorem ipsum dolor sit amet.');
            //toast('Error, no tienes derechos para esa acción', 'error', 'top-right');
            $user = User::find($grupo->user_id);
            $mensaje = 'Error, no tienes derechos para esa acción, este grupo es administrado por ' . $user->name;
            toast($mensaje, 'error', 'top-right');
            return redirect()->back()->with(['mensaje' => 'No tiene derechos para esta acción.']);
        }
        return $next($request);
    }
}
