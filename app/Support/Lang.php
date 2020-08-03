<?php

namespace App\Support;

use Illuminate\Support\Facades\Lang as BaseLang;

class Lang extends BaseLang
{
    public static function getRoute($key)
    {
        if (static::has('routes', static::getLocale())) {
            return static::get('routes.' . $key);
        }

        return $key;
    }
}
