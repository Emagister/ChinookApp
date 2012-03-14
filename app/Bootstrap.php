<?php


class Bootstrap extends Chinook\Bootstrap
{
    protected function _initProviders(Silex\Application $app)
    {
        require dirname(__DIR__) . '/app/configs/providers-' . $this->getEnv() . '.php';
    }

    protected function _initRoutes(Silex\Application $app)
    {
        require dirname(__DIR__) . '/app/configs/routes.php';
    }
}
