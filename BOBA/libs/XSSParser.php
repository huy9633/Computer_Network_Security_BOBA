<?php

class XSSParser 
{
    public static function get($string)
    {
        return htmlspecialchars($string, ENT_QUOTES , 'UTF-8');
    }

    public static function parser($input)
    {
        $result = [];

        foreach ($input as $key => $value) {
            $result[$key] = self::get($value);
        }

        return $result;
    }
}