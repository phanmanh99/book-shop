<?php

declare(strict_types=1);

namespace BookShop\Domain\Publisher;

use Ramsey\Uuid\UuidInterface;

interface PublisherRepository
{
    /**
     * @throws AuthorNotFound
     */
    public function get(UuidInterface $id): Publisher;

    public function store(Publisher $publisher): void;
}
