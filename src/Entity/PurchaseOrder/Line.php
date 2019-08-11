<?php

namespace App\Entity\PurchaseOrder;

use App\Entity\Product\ProductId;

/**
 * <<entity>>
 * 注文明細
 */
final class Line
{
    /**
     * @var int
     */
    private $lineNumber;

    /**
     * @var ProductId
     */
    private $productId;

    /**
     * @var int
     */
    private $quantity;

    public function __construct(int $lineNumber, ProductId $productId, int $quantity)
    {
        $this->lineNumber = $lineNumber;
        $this->productId = $productId;
        $this->quantity = $quantity;
    }
}
