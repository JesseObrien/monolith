<?php namespace MyApp\Services;

use MyApp\Ui\Web\OrnoRouteProvider;
use MyApp\Ui\Web\TwigProvider;

final class ApplicationServicesProvider implements ServiceProvider {

    /**
     * @var ServiceLoader
     */
    private $loader;

    public function __construct(ServiceLoader $loader) {
        $this->loader = $loader;
    }

    public function register() {
        $providers = [
            TwigProvider::class,
            OrnoRouteProvider::class
        ];

        foreach ($providers as $provider)
            $this->loader->load($provider);
    }
}
