<?php

if (! function_exists('route')) {
    /**
     * Generate the URL to a named route with prefixed locale.
     *
     * @param  array|string  $name
     * @param  mixed  $parameters
     * @param  bool  $absolute
     * @param  string  $locale
     * @return string
     */
    function route($name, $parameters = [], $absolute = true, $locale = null)
    {
        $currentLocale = config('app.locale');
        $locale = $locale ?: $currentLocale;

        // Remove the prefix from the route name.
        if (strpos($name, $currentLocale . '.') === 0) {
            $name = substr($name, 3);
        }

        return app('url')->route($locale . '.' . $name, $parameters, $absolute);
    }
}
