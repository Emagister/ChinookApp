<?php

require __DIR__ . '/silex.phar';
require dirname(__DIR__) . '/vendor/.composer/autoload.php';
require dirname(__DIR__) . '/app/Bootstrap.php';

/**
 * To run the application with the reverse proxy cache
 * enable the provider in the providers config file and
 * replace the application run with this
 */
// $app['http_cache']->run();
$bootstrap = new Bootstrap();
$bootstrap->bootstrap(new Silex\Application())
          ->run();