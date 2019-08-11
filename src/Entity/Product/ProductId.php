<?php

namespace App\Entity\Product;

/**
 * <<value object>>
 * 商品ID
 */
final class ProductId
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
}
