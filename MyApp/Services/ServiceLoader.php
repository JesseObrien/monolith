<?php namespace MyApp\Services;

use Orno\Di\Container;

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
        $provider = $this->container->get($providerClass);
        $provider->register();
    }
}
