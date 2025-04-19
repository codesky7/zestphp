<?php

namespace Core;

class Autoloader
{
    public function load($class)
    {
        $prefix = 'App\\';
        $base_dir = __DIR__ . '/../app/';

        $core_prefix = 'Core\\';
        $core_base = __DIR__ . '/';

        if (str_starts_with($class, $prefix)) {
            $relative_class = substr($class, strlen($prefix));
            $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
        } elseif (str_starts_with($class, $core_prefix)) {
            $relative_class = substr($class, strlen($core_prefix));
            $file = $core_base . str_replace('\\', '/', $relative_class) . '.php';
        } else {
            return;
        }

        if (file_exists($file)) {
            require_once $file;
        }
    }
}
