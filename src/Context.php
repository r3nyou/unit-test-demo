<?php

namespace App;

class Context
{
    private static $profiles = [
        'marcus' => '91',
        'mei' => '99',
    ];

    public static function getPassword($key)
    {
        return static::$profiles[$key];
    }
}
