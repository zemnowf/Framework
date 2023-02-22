<?php

namespace Fw\Core;

class Application
{
    private $pager = null;
    private static $instance = null;
    private $template = null;

    public function __construct()
    {
        Route::route();
        Config::configure();
    }

}