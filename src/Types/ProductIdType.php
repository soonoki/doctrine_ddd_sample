<?php

namespace App\Types;

use App\Entity\Product\ProductId;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

class ProductIdType extends Type
{
    const PRODUCT_ID = 'product_id';

    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return $platform->getVarcharTypeDeclarationSQL($fieldDeclaration);
    }

    public function getName()
    {
        return self::PRODUCT_ID;
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return $value->getId();
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new ProductId($value);
    }
}