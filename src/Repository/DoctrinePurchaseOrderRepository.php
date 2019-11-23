<?php

namespace App\Repository;

use App\Entity\PurchaseOrder\PurchaseOrder;
use App\Entity\PurchaseOrder\PurchaseOrderId;
use Doctrine\Common\Persistence\ObjectManager;
use Ramsey\Uuid\Uuid;

class DoctrinePurchaseOrderRepository implements PurchaseOrderRepository
{
    /**
     * @var ObjectManager
     */
    private $entityManager;

    public function __construct(ObjectManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function nextIdentify(): PurchaseOrderId
    {
        return new PurchaseOrderId(Uuid::uuid4()->toString());
    }

    public function findBy(PurchaseOrderId $id): ?PurchaseOrder
    {
        $className = array_slice(explode('\\', PurchaseOrder::class), -1)[0];
        $repository = $this->entityManager->getRepository($className);
//        return $repository->findOneBy(['purchase_order_id' => $id->getId()]);
        return $repository->find($id->getId());
    }

    public function save(PurchaseOrder $purchaseOrder): void
    {
        $this->entityManager->persist($purchaseOrder);
        $this->entityManager->flush();
    }
}
