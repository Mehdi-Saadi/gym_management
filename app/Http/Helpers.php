<?php

use Illuminate\Support\Facades\Route;

if (! function_exists('isActive')) {
    function isActive($route_name, $class_name = 'active') {

        if (is_array($route_name)) {
            return in_array(Route::currentRouteName(), $route_name) ? $class_name : '';
        }

        return Route::currentRouteName() == $route_name ? $class_name : '';
    }
}
