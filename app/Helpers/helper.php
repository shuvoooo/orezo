<?php

if (!function_exists('route_with_year')) {
    function route_with_year($route, $params = []): string
    {
        if (!array_key_exists('year', $params)) {
            $params['year'] = request()->route('year') ?? date('Y');
        }
        return route($route, $params);
    }
}
