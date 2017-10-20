<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('login');
            }
        }

        $user = $request->user();


            if ($user && $user->isAdminPusat())
            {
                return redirect('/admin_pusat');
            }

            if ($user && $user->isKafilah())
            {
                return redirect('/kafilah');
            }

            if ($user && $user->isOperatorRegistrasi())
            {
                notify()->flash('Welcome back!', 'success', [
                    'timer' => 2000,
                    'text' => 'It\'s really great to see you again',
                ]);
                return redirect('/operator_registrasi');
            }

            if ($user && $user->isPanitera())
            {
                return redirect('/panitera');
            }

            if ($user && $user->isPaniteraKitab())
            {
                return redirect('/panitera_kitab');
            }

        return $next($request);
    }
}
