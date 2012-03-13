<?php

namespace Chinook;

abstract class Bootstrap
{
    /**
     * The environment
     *
     * @var string
     */
    private $_env = 'dev';

    /**
     * Getter for the current environment
     *
     * @return string
     */
    public function getEnv()
    {
        if (false !== ($env = getenv('APPLICATION_ENV'))) {
            $this->_env = $env;
        }

        return $this->_env;
    }

    /**
     * Bootstraps the application. Uses fluent interface in order to
     * be more readable.
     *
     * @param \Silex\Application $app
     * @return \Silex\Application
     */
    public function bootstrap(\Silex\Application $app)
    {
        $this->_initProviders($app);
        $this->_initRoutes($app);

        return $app;
    }

    abstract protected function _initProviders(\Silex\Application $app);
    abstract protected function _initRoutes(\Silex\Application $app);
}
