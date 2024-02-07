<?php

declare(strict_types=1);

namespace CleanArchitecture\Domain\Entity;

// клієнт має багато замовлень
class Customer extends AbstractEntity {
    protected $name;
    protected $email;

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function getEmail() {
        return $this->emailAddress;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }
}