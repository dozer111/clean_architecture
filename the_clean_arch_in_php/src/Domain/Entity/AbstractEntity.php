<?php

declare(strict_types=1);

namespace CleanArchitecture\Domain\Entity;

abstract class AbstractEntity {
    protected $id;
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
        return $this;
    }
}