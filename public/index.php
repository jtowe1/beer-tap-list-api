<?php

use BTL\Controller\BeerController;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->get('/beer', [BeerController::class, 'list']);

$app->run();
