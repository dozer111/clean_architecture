<?php

namespace CleanPhp\Invoicer\Domain\Repository;

// Згідно книжки: Generally, we’re going to want to be able to do the following operations for Customers, Orders and Invoices
interface RepositoryInterface {
    public function getById($id);
    public function getAll();
    public function persist($entity);
    public function begin();
    public function commit();
}