<?php

namespace Fw\Core\Type;

class Server extends Dictionary
{

    public function __construct($readonly = true)
    {
        parent::__construct($_SERVER, $readonly);
    }
}