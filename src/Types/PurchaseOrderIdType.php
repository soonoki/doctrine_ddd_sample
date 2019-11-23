<?php

namespace App\Types;

use App\Entity\PurchaseOrder\PurchaseOrderId;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

class PurchaseOrderIdType extends Type
{
    const PURCHASE_ORDER_ID = 'purchase_order_id';

    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return $platform->getVarcharTypeDeclarationSQL($fieldDeclaration);
    }

    public function getName()
    {
        return self::PURCHASE_ORDER_ID;
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return $value->getId();
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new PurchaseOrderId($value);
    }
}