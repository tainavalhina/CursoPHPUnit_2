<?php

namespace OrderBundle\Validators;

class CreditCardNumberValidator
{
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function isValid()
    {

        //tamanho deve ser de 16 digitos e tem que ser numero, se for, retorna true
        return strlen($this->value) == 16 && is_numeric($this->value);
    }
} 