<?php

namespace App\UseCase;

class CreateOrderLineInputData
{
    /**
     * @var string
     */
    private $productId;

    /**
     * @var int
     */
    private $quantity;

    public function __construct(string $productId, int $quantity)
    {
        $this->productId = $productId;
        $this->quantity = $quantity;
    }

    public function getProductId(): string
    {
        return $this->productId;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }
}
