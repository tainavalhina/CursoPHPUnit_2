<?php

namespace OrderBundle\Repository;

use MyFramework\DataBase\ORM;

use OrderBundle\Entity\Customer;

class CustomerRepository extends ORM
{
    /**
     * @param $customerID
     * @return Customer
     */
    public function findByID($customerID)
    {

        /**
         * $costumerData = SELECT name, id FROM costumer WHERE id = X
         * 
         * $custumer = new Custumer($custumerData["name"], $costumerData["id"])
         * return $custumer;
         */
        return parent::findByID($customerID);
    }
}