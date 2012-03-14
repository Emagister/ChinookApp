<?php

// Prepare the environment
// $app['debug'] = true;

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
    'twig.path'       => dirname(__DIR__) . '/views',
    'twig.class_path' => dirname(__DIR__) . '/vendor/twig/lib'
));

// Url generator
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

// HTTP Cache
/*$app->register(new Silex\Provider\HttpCacheServiceProvider(), array(
    'http_cache.cache_dir' => dirname(__DIR__) . '/data/cache/'
));*/