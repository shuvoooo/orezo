<?php

namespace App\Http\Middleware;

use App\Models\UserEditPermission;
use Closure;
use Illuminate\Http\Request;

class YearMiddleware
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
        if ($request->method() != 'GET') {
            $year = $request->route('year');
            $year_data = UserEditPermission::where('year', $year)->first();
            if ($year_data && $year_data->user_can_edit == false) {
                return response()->json(['message' => 'You can not update information of ' . $year], 401);
            }
        }
        return $next($request);
    }
}
