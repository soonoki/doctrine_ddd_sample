<?php

namespace App\Entity\PurchaseOrder;

use App\Entity\Product\ProductId;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * <<aggregate root>>
 * 注文
 *
 * @ORM\Entity()
 * @ORM\Table(name="purchase_orders")
 */
final class PurchaseOrder
{
    /**
     * @var PurchaseOrderId
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\Column(type="purchase_order_id")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $orderNumber;

    /**
     * @var ShippingAddress
     * @ORM\Embedded(class="ShippingAddress")
     */
    private $shippingAddress;

    /**
     * @var Collection|Line[]
     * @ORM\OneToMany(
     *   targetEntity="Line",
     *   mappedBy="purchaseOrder",
     *   cascade={"PERSIST"}
     * )
     */
    private $lines;

    private function __construct(
        PurchaseOrderId $id,
        string $orderNumber,
        ShippingAddress $shippingAddress
    ) {
        $this->id = $id;
        $this->orderNumber = $orderNumber;
        $this->shippingAddress = $shippingAddress;
        $this->lines = [];
    }

    public static function create(
        PurchaseOrderId $id,
        string $orderNumber,
        ShippingAddress $shippingAddress
    ): self {
        return new self($id, $orderNumber, $shippingAddress);
    }

    public function addLine(ProductId $productId, int $orderedQuantity): void
    {
        $lineNumber = count($this->lines) + 1;

        $this->lines[] = new Line($this, $lineNumber, $productId, $orderedQuantity);
    }

    public function getId(): string
    {
        return $this->id->getId();
    }

    public function getOrderNumber(): string
    {
        return $this->orderNumber;
    }
}
