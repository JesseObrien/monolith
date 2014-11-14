<?php

// composer autoloader
require __DIR__ . '/../vendor/autoload.php';

$container = new \Illuminate\Container\Container();
$applicationServices = new \MyApp\Services\ApplicationServicesProvider($container);
