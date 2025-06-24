<?php

namespace OrderBundle\Validators;

class NumericValidator
{
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function isValid()
    {
        //se o valor for um numero retorna true
        return is_numeric($this->value);
    }
}