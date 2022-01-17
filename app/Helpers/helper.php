<?php

use App\Models\GeneralConfig;
use Illuminate\Support\Facades\Cache;
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
        if (Cache::has('general_config')) {
            $config = Cache::get('general_config');
        } else {
            $config = GeneralConfig::all();
            Cache::put('general_config', $config, 60);
        }
        return $config->where('key', $key)->first()->value ?? null;
    }
}

if (!function_exists('get_admin_route')) {
    function get_admin_route()
    {
        $menus = collect();

        foreach (include app_path("Helpers/admin_menu.php") as $key => $item) {
            if ($item['type'] == 'single') {
                $menus[$key] = $item['text'];
            } else {
                foreach ($item['submenu'] as $sub_key => $submenu) {
                    $menus[$sub_key] = $submenu['text'];
                }
            }
        }
        return $menus;
    }
}
