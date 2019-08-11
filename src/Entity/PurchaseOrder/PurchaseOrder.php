<?php

namespace App\Entity\PurchaseOrder;

use App\Entity\Product\ProductId;

/**
 * <<aggregate root>>
 * 注文
 */
final class PurchaseOrder
{
    /**
     * @var PurchaseOrderId
     */
    private $id;

    /**
     * @var string
     */
    private $orderNumber;

    /**
     * @var ShippingAddress
     */
    private $shippingAddress;

    /**
     * @var Line[]
     */
    private $lines;

    private function __construct(PurchaseOrderId $id, string $orderNumber, ShippingAddress $shippingAddress)
    {
        $this->id = $id;
        $this->orderNumber = $orderNumber;
        $this->shippingAddress = $shippingAddress;
    }

    public static function create(PurchaseOrderId $id, string $orderNumber, ShippingAddress $shippingAddress): self
    {
        return new self($id, $orderNumber, $shippingAddress);
    }

    public function addLine(ProductId $productId, int $orderedQuantity): void
    {
        $lineNumber = count($this->lines) + 1;

        $this->lines[] = new Line($lineNumber, $productId, $orderedQuantity);
    }
}
