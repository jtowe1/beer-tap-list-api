<?php

namespace BTL\Transformer;

use BTL\Model\Beer;

class BeerTransformer
{
    public static function transform(Beer $beer, bool $minimal = false): array
    {
        if (!$minimal) {
            return static::getData($beer);
        }

        return static::getMinimalData($beer);
    }

    protected static function getData(Beer $beer): array
    {
        return [
            'id' => $beer->getId(),
            'name' => $beer->getName(),
            'style_id' => $beer->getStyleId(),
            'from' => Beer::FROM_SLUGS[$beer->getFromId()],
            'created' => $beer->getCreated()->toDateTimeString(),
            'last_updated' => $beer->getLastUpdated()?->toDateTimeString(),
        ];
    }

    protected static function getMinimalData(Beer $beer): array
    {
        return [
            'id' => $beer->getId(),
            'name' => $beer->getName(),
        ];
    }
}