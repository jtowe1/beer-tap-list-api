<?php

namespace BTL\Hydrator;

use BTL\Model\Beer;
use Carbon\CarbonImmutable;

class BeerHydrator
{
    public static function hydrate(array $row): Beer
    {
        $beer = new Beer(
            $row['id'] ?? null,
            $row['name'],
            $row['style_id'],
            $row['from_id'],
            ($row['created'] ? CarbonImmutable::createFromTimeString($row['created']) : null),
            ($row['last_updated'] ? CarbonImmutable::createFromTimeString($row['last_updated']) : null)
        );

        return $beer;
    }
}
