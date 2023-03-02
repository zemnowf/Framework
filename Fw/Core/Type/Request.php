<?php

namespace Fw\Core\Type;

class Request extends Dictionary
{
    public function __construct($readonly = true)
    {
        parent::__construct($_REQUEST, $readonly);
    }
}