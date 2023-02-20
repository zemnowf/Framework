<?php

namespace Fw\Core;

class Application
{
    private $pager = null;
    private static $instanse = null;
    private $template = null;

    private function __construct()
    {
        Route::route();
        Config::configure();
    }

    public static function getInstance()
    {
        if (self::$instanse != null) {
            return self::$instanse;
        } else {
            return new static();
        }
    }


}