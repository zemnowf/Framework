<?php

namespace Fw\Core\Validation\Validators;

use Fw\Core\Validation\Validator;

class RegExp extends Validator
{

    public function validate($value): bool
    {
        return (bool)preg_match($this->rule, $value);
    }

}