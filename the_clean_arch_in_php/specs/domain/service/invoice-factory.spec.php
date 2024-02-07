<?php

use CleanPhp\Invoicer\Domain\Entity\Invoice;
use CleanPhp\Invoicer\Domain\Entity\Order;
use CleanPhp\Invoicer\Domain\Factory\InvoiceFactory;

// ./vendor/bin/peridot specs/domain/service/*
// ./vendor/bin/peridot specs/ --watch
describe('InvoiceFactory', function () {

    describe('->createFromOrder()', function () {
        it('should return an order object', function () {
            $order = new Order();
            $factory = new InvoiceFactory();
            $invoice = $factory->createFromOrder($order);
            assert($invoice instanceof Invoice, "Factory create correct Domain model");
        });

        it('should set the total of the invoice', function () {
            $order = new Order();
            $order->setTotal(500);
            $factory = new InvoiceFactory();
            $invoice = $factory->createFromOrder($order);
            assert($invoice->getTotal() == 500);
        });

        it('should associate the Order to the Invoice', function () {
            $order = new Order();
            $factory = new InvoiceFactory();
            $invoice = $factory->createFromOrder($order);
            assert($invoice->getOrder() == $order);
        });

        it('should set the date of the Invoice', function () {
            $order = new Order();
            $factory = new InvoiceFactory();
            $invoice = $factory->createFromOrder($order);
            assert(
                $invoice->getInvoiceDate()->format("Y-m-d") == (new DateTime())->format("Y-m-d"),
                "Order date is today"
            );
        });
    });
});