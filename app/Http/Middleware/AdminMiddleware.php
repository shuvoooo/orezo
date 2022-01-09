<?php

namespace App\Http\Middleware;

use App\Models\RolePermission;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && (Auth::user()->role == 'admin' || Auth::user()->role == 'staff')) {
            if (Auth::user()->role == 'staff') {
                $permissions = json_decode(RolePermission::where('user_id', Auth::id())->first()->details ?? "[]");

                if (!in_array(Route::currentRouteName(), $permissions) && in_array(Route::currentRouteName(), get_admin_route()->toArray())) {
                    return abort(401, 'You are not Authorize. Contact with Admin.');
                }
            }

            return $next($request);
        }

        return redirect(route('login'))->with('error', 'You are not authorized to access this page.');
    }
}
