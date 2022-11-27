<?php

namespace BTL\Controller;

use BTL\Model\Beer\Dao;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class BeerController
{
    public function list(Request $request, Response $response): Response
    {
        $offset = $request->getQueryParams()['offset'] ?? 0;

        $beerDao = new Dao();
        $beers = $beerDao->getAllStartingAt($offset);
        $body = $response->getBody();
        $body->write(json_encode($beers));
        return $response->withHeader('Content-Type', 'application/json');
    }
}
