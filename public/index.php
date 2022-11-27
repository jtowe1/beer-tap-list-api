<?php

use BTL\Controller\BeerController;
use Dotenv\Dotenv;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$env = Dotenv::createImmutable('../');
$env->load();
$env->required(
    [
        'DB_HOST',
        'DB_PORT',
        'DB_DATABASE',
        'DB_USERNAME',
        'DB_PASSWORD',
        'DB_ROOT_PASSWORD',
    ]
);

$app = AppFactory::create();

$app->get('/beer', [BeerController::class, 'list']);

$app->run();
