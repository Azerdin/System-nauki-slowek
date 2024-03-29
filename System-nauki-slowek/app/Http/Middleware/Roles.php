<?php
namespace App\Http\Middleware;

use Auth;
use Closure;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        // Not Logged
        if (!Auth::check()) {
            return redirect('/login');
        }
        // Not allowed
        if ($request->user()->roles->pivot->roles_id > $role) {
            return redirect()->route('home');
        }
        return $next($request);
    }
}