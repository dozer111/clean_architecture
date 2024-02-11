<?php

declare(strict_types=1);

namespace CleanPhp\Invoicer\Persistence\Zend\DataTable;

use CleanPhp\Invoicer\Domain\Repository\InvoiceRepositoryInterface;

class InvoiceTable extends AbstractDataTable
    implements InvoiceRepositoryInterface
{
}