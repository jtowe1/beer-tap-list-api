<?php

namespace BTL\Model;

use Carbon\CarbonImmutable;

class Beer
{
    public function __construct(
        private int $id,
        private string $name,
        private int $styleId,
        private CarbonImmutable $created,
        private CarbonImmutable $lastUpdated
    ) {

    }
}