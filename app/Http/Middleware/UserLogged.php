<?php

namespace App\Http\Middleware;

use Closure;

class UserLogged
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
                        $user = session('user');

        if(!empty($user)){
            return $next($request);
        }else{
            
                $request->session()->flash('message_type', 'alert-danger');
                $request->session()->flash('message', 'Debes iniciar sesión.');
                return redirect()->route('login');
            
        }
    }
}
