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
/** @var \Orno\Http\Request $request */
$request = $container->get('Orno\Http\Request');

// load services
$serviceLoader = new \MyApp\Services\ServiceLoader($container);
$serviceLoader->load(\MyApp\Config\EnvironmentProvider::class);
$serviceLoader->load(\MyApp\Ui\Web\TwigProvider::class);

// respond to request
$router = new Orno\Route\RouteCollection($container);
$router->get('/', 'MyApp\Ui\Web\Controllers\ExampleController::examplePage');
$dispatcher = $router->getDispatcher();
$response = $dispatcher->dispatch($request->getMethod(), $request->getRequestUri());
$response->send();
