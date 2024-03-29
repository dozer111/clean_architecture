<?php

declare(strict_types=1);

namespace CleanPhp\Invoicer\Persistence\Zend\DataTable;

use CleanPhp\Invoicer\Domain\Entity\AbstractEntity;
use CleanPhp\Invoicer\Domain\Repository\RepositoryInterface;
use Zend\Db\TableGateway\TableGateway;
use Zend\Stdlib\Hydrator\HydratorInterface;

abstract class AbstractDataTable implements RepositoryInterface
{
    protected $gateway;
    protected $hydrator;

    public function __construct(
        TableGateway      $gateway,
        HydratorInterface $hydrator
    )
    {
        $this->gateway = $gateway;
        $this->hydrator = $hydrator;
    }

    public function getById($id)
    {
        $result = $this->gateway
            ->select(['id' => intval($id)])
            ->current();
        return $result ? $result : false;
    }

    public function getAll()
    {
        $resultSet = $this->gateway->select();
        return $resultSet;
    }

    public function persist(AbstractEntity $entity)
    {
        $data = $this->hydrator->extract($entity);
        if ($this->hasIdentity($entity)) {
            $this->gateway->update($data, ['id' => $entity->getId()]);
        } else {
            $this->gateway->insert($data);
            $entity->setId($this->gateway->getLastInsertValue());
        }
        return $this;
    }

    public function begin()
    {
        $this->gateway->getAdapter()
            ->getDriver()->getConnection()->beginTransaction();
        return $this;
    }

    public function commit()
    {
        $this->gateway->getAdapter()
            ->getDriver()->getConnection()->commit();
        return $this;
    }

    protected function hasIdentity(AbstractEntity $entity)
    {
        return !empty($entity->getId());
    }
}