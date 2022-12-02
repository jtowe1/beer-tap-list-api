<?php

namespace BTL\Model;

use Carbon\CarbonInterface;

class Beer
{
    const FROM_MANUALLY_ENTERED = 1;
    const FROM_BREWFATHER = 2;

    const FROM_SLUGS = [
        self::FROM_MANUALLY_ENTERED => 'manually_entered',
        self::FROM_BREWFATHER => 'brewfather',
    ];

    public function __construct(
        private ?int $id,
        private string $name,
        private int $styleId,
        private int $fromId,
        private CarbonInterface $created,
        private ?CarbonInterface $lastUpdated
    ) {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getStyleId(): int
    {
        return $this->styleId;
    }

    public function getFromId(): int
    {
        return $this->fromId;
    }

    public function getCreated(): CarbonInterface
    {
        return $this->created;
    }

    public function getLastUpdated(): ?CarbonInterface
    {
        return $this->lastUpdated;
    }
}