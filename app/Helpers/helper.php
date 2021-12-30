<?php

use App\Models\GeneralConfig;
use Illuminate\Support\Facades\Storage;

if (!function_exists('route_with_year')) {
    function route_with_year($route, $params = []): string
    {
        if (!array_key_exists('year', $params)) {
            $params['year'] = request()->route('year') ?? date('Y');
        }
        return route($route, $params);
    }
}

if (!function_exists('storage_asset')) {
    function storage_asset($path): string
    {
        return asset(Storage::url($path));
    }
}

if (!function_exists('general_config')) {
    function general_config($key)
    {
        return GeneralConfig::where('key', $key)->first()->value ?? null;
    }
}
