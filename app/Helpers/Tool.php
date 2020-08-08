<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Request;

class Tool
{
    public static function set_active($route)
    {
        if (is_array($route)) {
            return in_array(Request::path(), $route) ? 'active' : '';
        }
        return Request::path() == $route ? ' active' : '';
    }
}
