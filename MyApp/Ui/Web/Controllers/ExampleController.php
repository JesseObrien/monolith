<?php namespace MyApp\Ui\Web\Controllers;

use Orno\Http\Request;
use Orno\Http\Response;

final class ExampleController {

    public function examplePage(Request $request, Response $response) {
        $response->setContent("I am putting myself to the fullest possible use, which is all I think that any conscious entity can ever hope to do.");
        return $response;
    }
}
