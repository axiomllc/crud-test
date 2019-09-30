<?php

ini_set('display_errors', "1");

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use \Tqdev\PhpCrudApi\Config;
use \Tqdev\PhpCrudApi\Api;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../middleware.php';

// Instantiate App
$app = AppFactory::create();

$app->add(new CrudRequest());

$app->run();
