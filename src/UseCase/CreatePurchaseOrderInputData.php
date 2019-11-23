<?php

namespace App\UseCase;

class CreatePurchaseOrderInputData
{
    /**
     * @var string
     */
    private $orderNumber;

    /**
     * @var string
     */
    private $shippingAddressZipCode;

    /**
     * @var string
     */
    private $shippingAddressPrefecture;

    /**
     * @var string
     */
    private $shippingAddressCity;

    /**
     * @var CreateOrderLineInputData[]
     */
    private $orderLines;

    public function __construct(
        string $orderNumber,
        string $shippingAddressZipCode,
        string $shippingAddressPrefecture,
        string $shippingAddressCity,
        array $orderLines
    ) {
        $this->orderNumber = $orderNumber;
        $this->shippingAddressZipCode = $shippingAddressZipCode;
        $this->shippingAddressPrefecture = $shippingAddressPrefecture;
        $this->shippingAddressCity = $shippingAddressCity;
        $this->orderLines = $orderLines;
    }

    public function getOrderNumber(): string
    {
        return $this->orderNumber;
    }

    public function getShippingAddressZipCode(): string
    {
        return $this->shippingAddressZipCode;
    }

    public function getShippingAddressPrefecture(): string
    {
        return $this->shippingAddressPrefecture;
    }

    public function getShippingAddressCity(): string
    {
        return $this->shippingAddressCity;
    }

    public function getOrderLines(): array
    {
        return $this->orderLines;
    }
}
