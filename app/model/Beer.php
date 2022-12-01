<?php

namespace BTL\Model;

use Carbon\CarbonImmutable;

class Beer
{
    public function __construct(
        private ?int $id,
        private string $name,
        private int $styleId,
        private int $fromId,
        private CarbonImmutable $created,
        private CarbonImmutable $lastUpdated
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
}