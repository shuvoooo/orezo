<?php

namespace App\Http\Middleware;

use App\Models\Setting;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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
                $setting = Setting::find(1);
                if ($setting->database_offline == '1') {
                    Redirect::to('/offline')->send();
                }
            }

            return $next($request);
        }

        return redirect('/home');
    }
}
