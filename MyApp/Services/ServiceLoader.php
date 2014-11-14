<?php namespace MyApp\Services;

use Illuminate\Container\Container;

final class ServiceLoader {

    /**
     * @var Container
     */
    private $container;

    public function __construct(Container $container) {
        $this->container = $container;
    }

    public function load($providerClass) {
        /** @var ServiceProvider $provider */
        $provider = $this->container->make($providerClass);
        $provider->register();
    }
}
