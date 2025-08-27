<?php

use Illuminate\Support\Facades\Route;

if (!function_exists('isActiveRoute')) {
    function isActiveRoute($routes, $activeClass = 'bg-gray-200 text-gray-900 font-semibold', $inactiveClass = 'hover:bg-gray-100 hover:text-gray-800')
    {
        // Pastikan $routes selalu array
        if (!is_array($routes)) {
            $routes = [$routes];
        }

        // Cek apakah salah satu route cocok
        foreach ($routes as $route) {
            if (Route::currentRouteNamed($route)) {
                return $activeClass;
            }
        }

        // Jika tidak cocok, pakai inactive class
        return $inactiveClass;
    }
}
