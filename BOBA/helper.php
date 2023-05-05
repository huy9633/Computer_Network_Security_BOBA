<?php

session_start();

// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';
// echo $id = session_id();

require_once 'libs/CSRFSecurity.php';
require_once 'libs/XSSParser.php';

if (!function_exists('csrf_security')) {
    function csrf_security () {
        return CSRFSecurity::getInstance();
    }
}

if (!function_exists('flash_message')) {
    function flash_message($name, $value = '', $prefix = '_flash_') 
    {
        $key =  $prefix . $name;

        if (empty($value)) {
            if (!empty($_SESSION[$key])) {
                $content = $_SESSION[$key];
                unset($_SESSION[$key]);

                return $content;
            }

            return '';
        }

        $_SESSION[$key] = $value;
    }
}

if (!function_exists('has_flash_message')) {
    function has_flash_message($name, $prefix = '_flash_') 
    {
        return !empty($_SESSION[$prefix . $name]);
    }
}

if (!function_exists('redirect')) {
    function redirect($path)
    {
        $host = $_SERVER['HTTP_HOST'] . "/BOBA";

        header("Location: http://$host/$path");
    }
}

if (!function_exists('base_url')) {
    function base_url($path = '')
    {
        $host = $_SERVER['HTTP_HOST'] . "/BOBA";

        return "http://$host/$path";
    }
}