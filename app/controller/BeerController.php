<?php

namespace BTL\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class BeerController
{
    public function list(Request $request, Response $response, array $args): Response
    {
        $body = $response->getBody();
        $body->write(json_encode(['test' => 'value']));
        return $response->withHeader('Content-Type', 'application/json');
    }
}
