<?php

declare(strict_types=1);

namespace BookShop\Infrastructure\Adapters\Doctrine\DBAL\Types;

use BookShop\Domain\Publisher\Phone;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Stringable;

class PublisherPhoneType extends StringableType
{
    protected function doConvertToPHPValue(string $value, AbstractPlatform $platform): Stringable
    {
        return Phone::fromString($value);
    }
}
