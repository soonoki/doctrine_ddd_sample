<?php

namespace App\Entity\PurchaseOrder;

use App\Entity\Product\ProductId;
use Doctrine\ORM\Mapping as ORM;

/**
 * <<entity>>
 * 注文明細
 *
 * @ORM\Entity()
 * @ORM\Table(name="purchase_order_lines")
 */
final class Line
{
    /**
     * @var int
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var PurchaseOrder
     * @ORM\ManyToOne(targetEntity="PurchaseOrder")
     */
    private $purchaseOrder;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    private $lineNumber;

    /**
     * @var ProductId
     * @ORM\Column(type="product_id")
     */
    private $productId;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    private $quantity;

    public function __construct(PurchaseOrder $purchaseOrder, int $lineNumber, ProductId $productId, int $quantity)
    {
        $this->purchaseOrder = $purchaseOrder;
        $this->lineNumber = $lineNumber;
        $this->productId = $productId;
        $this->quantity = $quantity;
    }

    public function getProductId(): string
    {
        return $this->productId->getId();
    }
}
