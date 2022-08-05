<?php

error_reporting(E_ALL);
ini_set('display_errors', true);

use App\Application;
use App\Controller;
use App\Router;

require_once 'vendor/autoload.php';

$router = new Router();

$router->get('/', [Controller::class, 'index']);
$router->get('/products', [Controller::class, 'storeProduct']);
$router->get('/products/create', [Controller::class, 'createProduct']);
$router->get('/products/delete', [Controller::class, 'deleteProduct']);
$application = new Application($router);

$application->run();
