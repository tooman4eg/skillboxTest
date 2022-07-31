<?php

error_reporting(E_ALL);
ini_set('display_errors', true);

//use App\Application;
use App\Controller;
use App\Router;

require_once 'vendor/autoload.php';


$app = new \Core\Aplication();
$app->setConfigPath()->setRoutesPath();
echo "Ok";
die();
$router = new Router();

$router->get('/', [Controller::class, 'index']);
$router->post('/products', [Controller::class, 'storeProduct']);
$router->get('/products/create', [Controller::class, 'createProduct']);
$router->post('/products/delete', [Controller::class, 'deleteProduct']);

$application = new Application($router);

$application->run();
