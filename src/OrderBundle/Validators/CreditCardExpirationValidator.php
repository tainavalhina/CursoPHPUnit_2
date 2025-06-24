<?php

namespace OrderBundle\Validators;

class CreditCardExpirationValidator
{
    private $value;

    public function __construct(\DateTime $value)
    {
        $this->value = $value;
    }

    public function isValid()
    {
        //se a data de validade for maior que a atual, retorna true
        $now = new \DateTime('now');
        return $this->value > $now;
    }
}