<?php

namespace App\Repository;

use App\Entity\PurchaseOrder\PurchaseOrder;
use App\Entity\PurchaseOrder\PurchaseOrderId;
use Ramsey\Uuid\Uuid;

class InMemoryPurchaseOrderRepository implements PurchaseOrderRepository
{
    /**
     * @var array
     */
    private $store;

    public function nextIdentify(): PurchaseOrderId
    {
        return new PurchaseOrderId(Uuid::uuid4()->toString());
    }

    public function findBy(PurchaseOrderId $id): ?PurchaseOrder
    {
        if (!isset($this->store[$id->getId()])) {
            return null;
        }

        return $this->store[$id->getId()];
    }

    public function save(PurchaseOrder $purchaseOrder): void
    {
        $this->store[$purchaseOrder->getId()] = $purchaseOrder;
    }
}
