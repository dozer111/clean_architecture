<?php

declare(strict_types=1);

namespace CleanPhp\Invoicer\Persistence\Zend\DataTable;

use CleanPhp\Invoicer\Domain\Repository\CustomerRepositoryInterface;

class CustomerTable extends AbstractDataTable
    implements CustomerRepositoryInterface
{
}