<?php

namespace Fw\Core\Type;

class Session extends Dictionary
{
    public function __construct($readonly = false)
    {
        parent::__construct($_SESSION, $readonly);
    }
}