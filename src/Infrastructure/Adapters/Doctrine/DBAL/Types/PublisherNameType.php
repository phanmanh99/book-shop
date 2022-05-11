<?php

declare(strict_types=1);

namespace BookShop\Infrastructure\Adapters\Doctrine\DBAL\Types;

use BookShop\Domain\Publisher\Name;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Stringable;

class PublisherNameType extends StringableType
{
    protected function doConvertToPHPValue(string $value, AbstractPlatform $platform): Stringable
    {
        return Name::fromString($value);
    }
}
