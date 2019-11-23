<?php

namespace App\Entity\PurchaseOrder;

/**
 * <<value object>>
 * 注文ID
 */
final class PurchaseOrderId
{
    /**
     * @var string
     */
    private $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function __toString(): string
    {
        return $this->id;
    }
}
