<?php

class Request {

    public static function uri() {
        // $uri = trim($_SERVER['REQUEST_URI'] , "/");
        $uri = parse_url($_SERVER['REQUEST_URI'] , PHP_URL_PATH);
        $uri = str_replace("hsoub" , "" , $uri);
        return trim($uri , "/");
    }

    public static function get($key, $default = null)  {
        return $_GET[$key] ?? $_POST[$key] ?? $default;
    }

    public static function type() {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

}

