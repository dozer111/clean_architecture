<?php

declare(strict_types=1);

namespace CleanPhp\Invoicer\Persistence\Zend\DataTable;

use CleanPhp\Invoicer\Domain\Repository\OrderRepositoryInterface;

class OrderTable extends AbstractDataTable
    implements OrderRepositoryInterface
{
    public function getUninvoicedOrders()
    {
        return [];
    }
}