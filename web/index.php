<?php

require __DIR__ . '/silex.phar';
require dirname(__DIR__) . '/vendors/.composer/autoload.php';
require dirname(__DIR__) . '/app/Bootstrap.php';

$bootstrap = new Bootstrap();
$bootstrap->bootstrap(new Silex\Application())
          ->run();