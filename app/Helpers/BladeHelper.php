<?php

use Illuminate\Support\Facades\Route;

if (!function_exists('isActiveRoute')) {
    function isActiveRoute($routes, $activeClass = 'bg-gray-200 text-gray-900 font-semibold', $inactiveClass = 'hover:bg-gray-100 hover:text-gray-800')
    {
        if (!is_array($routes)) {
            $routes = [$routes];
        }

        foreach ($routes as $route) {
            if (Route::currentRouteNamed($route)) {
                return $activeClass;
            }
        }

        return $inactiveClass;
    }
}
