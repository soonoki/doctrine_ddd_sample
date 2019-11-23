<?php

namespace App\Entity\PurchaseOrder;

use Doctrine\ORM\Mapping as ORM;

/**
 * <<value object>>
 * 出荷先住所
 *
 * @ORM\Embeddable()
 */
final class ShippingAddress
{
    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $zipCode;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $prefecture;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $city;

    public function __construct(string $zipCode, string $prefecture, string $city)
    {
        $this->zipCode = $zipCode;
        $this->prefecture = $prefecture;
        $this->city = $city;
    }
}
