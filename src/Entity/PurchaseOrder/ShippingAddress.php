<?php

namespace App\Entity\PurchaseOrder;

/**
 * <<value object>>
 * 出荷先住所
 */
final class ShippingAddress
{
    /**
     * @var string
     */
    private $zipCode;

    /**
     * @var string
     */
    private $prefecture;

    /**
     * @var string
     */
    private $city;

    public function __construct(string $zipCode, string $prefecture, string $city)
    {
        $this->zipCode = $zipCode;
        $this->prefecture = $prefecture;
        $this->city = $city;
    }
}
