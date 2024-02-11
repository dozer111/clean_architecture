<?php

namespace CleanPhp\Invoicer\Domain\Repository;

// Згідно книжки: Generally, we’re going to want to be able to do the following operations for Customers, Orders and Invoices
use CleanPhp\Invoicer\Domain\Entity\AbstractEntity;

interface RepositoryInterface {
    public function getById($id);
    public function getAll();
    public function persist(AbstractEntity $entity);
    public function begin();
    public function commit();
}