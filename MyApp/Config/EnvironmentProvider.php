<?php namespace MyApp\Config;

use Orno\Config\Repository;
use MyApp\Services\ServiceProvider;
use MyApp\Services\ServiceLoader;
use Dotenv;

final class EnvironmentProvider extends ServiceLoader implements ServiceProvider {

    public function register() {
        
        Dotenv::load(__DIR__);

        $config = $this->container()->get(Repository::class);

        foreach ($_ENV as $key => $value)
            $config->set($key, $value);
    }
}
