<?php

namespace Fw\Core;

class Config
{
    private static array $configs = [];

    public function __construct()
    {
    }

    public static function configure()
    {
        self::$configs =require_once 'Fw/config.php';
    }

    public static function get(string $path)
    {

        $keys = explode('/', $path);
        $config = self::$configs;

        foreach ($keys as $key) {
            $config = $config[$key];
        }

        return $config;

    }

}