<?php

namespace App\UseCase;

interface CreatePurchaseOrderOutputData
{
    public function isSuccess(): bool;

    public function generatedPurchaseId(): string;

    public function getError(): array;
}
