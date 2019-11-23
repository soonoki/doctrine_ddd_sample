<?php

namespace App\UseCase;

use App\Entity\Product\ProductId;
use App\Entity\PurchaseOrder\PurchaseOrder;
use App\Entity\PurchaseOrder\ShippingAddress;
use App\Repository\PurchaseOrderRepository;

final class CreatePurchaseOrderUseCase
{
    /**
     * @var PurchaseOrderRepository
     */
    private $purchaseOrderRepository;

    /**
     * @param PurchaseOrderRepository $purchaseOrderRepository
     */
    public function __construct(PurchaseOrderRepository $purchaseOrderRepository)
    {
        $this->purchaseOrderRepository = $purchaseOrderRepository;
    }

    public function handle(CreatePurchaseOrderInputData $inputData): CreatePurchaseOrderOutputData
    {
        $purchaseOrderId = $this->purchaseOrderRepository->nextIdentify();
        $purchaseOrder = PurchaseOrder::create(
            $purchaseOrderId,
            $inputData->getOrderNumber(),
            new ShippingAddress(
                $inputData->getShippingAddressZipCode(),
                $inputData->getShippingAddressPrefecture(),
                $inputData->getShippingAddressCity()
            )
        );

        /** @var CreateOrderLineInputData $line */
        foreach ($inputData->getOrderLines() as $line) {
            $purchaseOrder->addLine(new ProductId($line->getProductId()), $line->getQuantity());
        }

        $this->purchaseOrderRepository->save($purchaseOrder);

        return new SuccessCreatePurchaseOrderOutput($purchaseOrderId);
    }
}
