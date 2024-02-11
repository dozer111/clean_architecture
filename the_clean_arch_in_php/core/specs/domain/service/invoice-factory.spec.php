<?php

use CleanPhp\Invoicer\Domain\Entity\Invoice;
use CleanPhp\Invoicer\Domain\Entity\Order;
use CleanPhp\Invoicer\Domain\Factory\InvoiceFactory;
use CleanPhp\Invoicer\Domain\Service\InvoicingService;

// ./vendor/bin/peridot specs/domain/service/*
// ./vendor/bin/peridot specs/ --watch

// функція "assert" не працювала як в книжці. Прийшлось зробить свою
function myAssert(bool $assertion, string $description = "")
{
    if (!$assertion) {
        throw new Error($description);
    }
}

describe('InvoiceFactory', function () {
    describe('->createFromOrder()', function () {
        it('should return an order object', function () {
            $order = new Order();
            $factory = new InvoiceFactory();
            $invoice = $factory->createFromOrder($order);
            myAssert($invoice instanceof Invoice, "Factory create correct Domain model");
        });

        it('should set the total of the invoice', function () {
            $order = new Order();
            $order->setTotal(500);
            $factory = new InvoiceFactory();
            $invoice = $factory->createFromOrder($order);
            myAssert($invoice->getTotal() == 500);
        });

        it('should associate the Order to the Invoice', function () {
            $order = new Order();
            $factory = new InvoiceFactory();
            $invoice = $factory->createFromOrder($order);
            myAssert($invoice->getOrder() == $order);
        });

        it('should set the date of the Invoice', function () {
            $order = new Order();
            $factory = new InvoiceFactory();
            $invoice = $factory->createFromOrder($order);
            myAssert(
                $invoice->getInvoiceDate()->format("Y-m-d") == (new DateTime())->format("Y-m-d"),
                "Order date is today"
            );
        });
    });
});

describe('InvoicingService', function () {
    describe('->generateInvoices()', function () {
        beforeEach(function () {
            $this->repository = $this->getProphet()
                ->prophesize('CleanPhp\Invoicer\Domain\Repository\OrderRepositoryInterface');
            $this->factory = $this->getProphet()
                ->prophesize('CleanPhp\Invoicer\Domain\Factory\InvoiceFactory');
        });
        afterEach(function () {
            $this->getProphet()->checkPredictions();
        });

        it('should query the repository for uninvoiced Orders', function () {
            $this->repository->getUninvoicedOrders()->shouldBeCalled()->willReturn([]);
            $service = new InvoicingService(
                $this->repository->reveal(),
                $this->factory->reveal()
            );
            $service->generateInvoices();
        });

        it('should return an Invoice for each uninvoiced Order', function () {
            $orders = [(new Order())->setTotal(400)];
            $invoices = [(new Invoice())->setTotal(400)];
            $this->repository->getUninvoicedOrders()->willReturn($orders);
            $this->factory->createFromOrder($orders[0])->willReturn($invoices[0]);

            $service = new InvoicingService(
                $this->repository->reveal(),
                $this->factory->reveal()
            );
            $results = $service->generateInvoices();

            myAssert(is_array($results));
            myAssert(count($results) == count($orders));
        });
    });
});

