<?php

namespace Fw\Core\Validation\Validators;

use Fw\Core\Validation\Validator;

class Phone extends RegExp
{

    public function __construct($rule = null)
    {
        parent::__construct($rule);
        $this->rule = "/^\\+?[1-9][0-9]{7,14}$/";
    }

}