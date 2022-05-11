<?php

declare(strict_types=1);

namespace BookShop\Application\Query\BackOffice\Author;

/** @psalm-immutable */
class Author
{
    public function __construct(
        public string $id,
        public string $name
    ) {
    }
}
