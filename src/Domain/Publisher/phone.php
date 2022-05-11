<?php

declare(strict_types=1);

namespace BookShop\Domain\Publisher;

use Stringable;

class Phone implements Stringable
{
    public function __construct(
        private string $phone
    ) {
    }

    public static function fromString(string $phone): self
    {
        return new self($phone);
    }

    public function __toString(): string
    {
        return $this->phone;
    }
}
