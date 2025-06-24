<?php

namespace OrderBundle\Validators;

class NotEmptyValidator
{
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function isValid()
    {

    // se $this->value está vazio, empty() retorna true, e a negação ! inverte para false.
    //ou seja, se vazia(empty) = retorna false


        return !empty($this->value);
    }
}