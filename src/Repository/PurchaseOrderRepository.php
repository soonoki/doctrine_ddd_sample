<?php

namespace App\Repository;

use App\Entity\PurchaseOrder\PurchaseOrder;
use App\Entity\PurchaseOrder\PurchaseOrderId;

interface PurchaseOrderRepository
{
    public function nextIdentify(): PurchaseOrderId;

    public function findBy(PurchaseOrderId $id): ?PurchaseOrder;

    public function save(PurchaseOrder $purchaseOrder): void;
}
