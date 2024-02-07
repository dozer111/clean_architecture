<?php

declare(strict_types=1);

namespace CleanArchitecture\Domain\Entity;

// клієнт має багато замовлень
// замовлення може мати багато інвойсів
class Order
{
    protected $customer;
    protected $orderNumber;
    protected $description;
    protected $total;

    public function getCustomer()
    {
        return $this->customer;
    }

    public function setCustomer($customer)
    {
        $this->customer = $customer;
        return $this;
    }

    public function getOrderNumber()
    {
        return $this->orderNumber;
    }

    public function setOrderNumber($orderNumber)
    {
        $this->orderNumber = $orderNumber;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function setTotal($total)
    {
        $this->total = $total;
        return $this;
    }
}