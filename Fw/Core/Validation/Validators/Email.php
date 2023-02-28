<?php

namespace Fw\Core\Validation\Validators;

use Fw\Core\Validation\Validator;

class Email extends RegExp
{

    public function __construct($rule)
    {
        parent::__construct($rule);
        $this->rule = FILTER_VALIDATE_EMAIL;
    }

}