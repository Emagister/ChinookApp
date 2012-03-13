<?php

// Prepare the environment
$app['debug'] = true;

// Doctrine 2
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver' => 'pdo_sqlite',
        'path'   => dirname(__DIR__) . '/data/chinook.sqlite'
    ),
    'db.dbal.class_path'   => dirname(__DIR__) . '/vendor/doctrine-dbal/lib',
    'db.common.class_path' => dirname(__DIR__) . '/vendor/doctrine-common/lib'
));

// Twig
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path'       => dirname(__DIR__) . '/app/views',
    'twig.class_path' => dirname(__DIR__) . '/vendor/twig/lib'
));

// Monolog
$app->register(new Silex\Provider\MonologServiceProvider(), array(
    'monolog.logfile'    => dirname(__DIR__) . '/data/logs/development.log',
    'monolog.class_path' => dirname(__DIR__) . '/vendor/monolog/src',
    'monolog.name'       => 'chinook'
));

// Url generator
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

// Validator
$app->register(new Silex\Provider\ValidatorServiceProvider(), array(
    'validator.class_path' => dirname(__DIR__) . '/vendor/symfony/src'
));

// HTTP Cache
$app->register(new Silex\Provider\HttpCacheServiceProvider(), array(
    'http_cache.cache_dir' => dirname(__DIR__) . '/data/cache/'
));