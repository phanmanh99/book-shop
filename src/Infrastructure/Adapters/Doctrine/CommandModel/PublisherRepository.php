<?php

declare(strict_types=1);

namespace BookShop\Infrastructure\Adapters\Doctrine\CommandModel;

use BookShop\Domain\Publisher\Publisher;
use BookShop\Domain\Publisher\PublisherNotFound;
use Doctrine\ORM\EntityManagerInterface;
use Ramsey\Uuid\UuidInterface;

class PublisherRepository implements \BookShop\Domain\Publisher\PublisherRepository
{
    public function __construct(
        private EntityManagerInterface $entityManager
    ) {
    }

    public function store(Publisher $publisher): void
    {
        $this->entityManager->persist($publisher);
    }

    public function get(UuidInterface $id): Publisher
    {
        return $this->entityManager->find(Publisher::class, $id) ?? throw new PublisherNotFound();
    }
}
