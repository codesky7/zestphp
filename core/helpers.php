<?php
if (!function_exists('env')) {
    function env($key, $default = null) {
        return $_ENV[$key] ?? $default;
    }
}

if (!function_exists('database_path')) {
    function database_path($path = '') {
        return __DIR__ . '/../database/' . $path;
    }
}

if (!function_exists('view')) {
    function view($path, $data = []) {
        extract($data);
        $file = __DIR__ . '/../resources/views/' . str_replace('.', '/', $path) . '.php';
        if (!file_exists($file)) {
            throw new Exception("View $path not found");
        }
        ob_start();
        include $file;
        return ob_get_clean();
    }
}
