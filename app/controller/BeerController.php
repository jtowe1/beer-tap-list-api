<?php

namespace BTL\Controller;

use BTL\Hydrator\BeerHydrator;
use BTL\Model\Beer\Dao;
use BTL\Transformer\BeerTransformer;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class BeerController
{
    public function list(Request $request, Response $response): Response
    {
        $offset = $request->getQueryParams()['offset'] ?? 0;

        $beerDao = new Dao();
        $rows = $beerDao->getAllStartingAt($offset);
        $transformedBeers = [];
        foreach($rows as $row) {
            $beer = BeerHydrator::hydrate($row);
            $transformedBeers[] = BeerTransformer::transform($beer);
        }
        $body = $response->getBody();
        $body->write(json_encode($transformedBeers));
        return $response->withHeader('Content-Type', 'application/json');
    }
}
