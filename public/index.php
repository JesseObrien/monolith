<?php
function dd($var) {
    die(var_dump($var));
}

error_reporting(E_ALL);

// composer autoloader
require __DIR__ . '/../vendor/autoload.php';

// bootstrap container
$container = new \Orno\Di\Container();
$container->singleton('Orno\Http\Request', function () {
    return \Orno\Http\Request::createFromGlobals();
});

// load services
$serviceLoader = new \MyApp\Services\ServiceLoader($container);
$serviceLoader->load(\MyApp\Ui\Web\TwigProvider::class);

// respond to request
$router = new Orno\Route\RouteCollection;
$router->get('/', 'MyApp\Ui\Web\Controllers\ExampleController::examplePage');
$dispatcher = $router->getDispatcher();
$response = $dispatcher->dispatch('GET', '/');
$response->send();
