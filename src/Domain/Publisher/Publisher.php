<?php

declare(strict_types=1);

namespace BookShop\Domain\Publisher;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\UuidInterface;

/** @ORM\Entity */
class Publisher
{
    /** @ORM\Id() @ORM\Column(type="uuid") */
    private UuidInterface $id;

    /** @ORM\Column(type="publisher_name") */
    private Name $name;

    /** @ORM\Column(type="publisher_phone") */
    private Phone $phone;

    public function __construct(UuidInterface $id, Name $name, Phone $phone)
    {
        $this->id   = $id;
        $this->name = $name;
        $this->phone = $phone;
    }

    public function setName(Name $name): void
    {
        $this->name = $name;
    }

    public function setPhone(Phone $phone): void
    {
        $this->phone = $phone;
    }
}
