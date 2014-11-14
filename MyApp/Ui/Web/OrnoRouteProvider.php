<?php namespace MyApp\Ui\Web;

use MyApp\Services\ServiceProvider;
use Orno\Http\Request;
use Orno\Http\Response;
use Orno\Route\RouteCollection;

final class OrnoRouteProvider implements ServiceProvider {

    public function register() {

        $router = new RouteCollection;

        $router->addRoute('GET', '/acme/route', function (Request $request, Response $response) {
            // do some clever shiz
            return $response;
        });

        $dispatcher = $router->getDispatcher();
        $response = $dispatcher->dispatch('GET', '/acme/route');
        $response->send();
    }
}
