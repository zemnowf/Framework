<?php

namespace Fw\Core\Validation;

abstract class Validator
{
    private $rule = null;

    public function __construct($rule) {
        $this->rule = $rule;
    }

    abstract public function validate($value): bool;
}