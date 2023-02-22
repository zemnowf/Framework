<?php

namespace Fw\Core;

class InstanceContainer
{
    private static array $instances = [];

    public static function get(string $class)
    {
        if (self::$instances[$class] == null) {
            self::$instances[$class] = new $class;
        }
    }
}