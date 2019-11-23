<?php

namespace App\UseCase;

use App\Entity\PurchaseOrder\PurchaseOrderId;

final class SuccessCreatePurchaseOrderOutput implements CreatePurchaseOrderOutputData
{
    /**
     * @var PurchaseOrderId
     */
    private $generatedPurchaseId;

    public function __construct(PurchaseOrderId $generatedPurchaseId)
    {
        $this->generatedPurchaseId = $generatedPurchaseId;
    }

    public function isSuccess(): bool
    {
        return true;
    }

    public function generatedPurchaseId(): string
    {
        return $this->generatedPurchaseId->getId();
    }

    public function getError(): array
    {
        throw new \RuntimeException('成功時にgetError()は呼び出せません.');
    }

}
