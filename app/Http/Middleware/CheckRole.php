<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $userRole = auth()->user()->role;

        if (in_array($userRole, $roles)) {
            return $next($request);
        }

        switch ($userRole) {
            case 'pemilik':
                return redirect('/admin');
                break;
            case 'customer':
                return redirect('/');
                break;
            case 'admin':
                return redirect('/admin');
                break;
            case 'supplier':
                return redirect('/admin');
                break;
            default:
                abort(403, 'Unauthorized action.');
        }
    }
}
