<?php

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

$app->get('/', function() use ($app) {
    return $app['twig']->render('index/index.twig');
})
->bind('homepage');

$app->get('/customers/{page}', function($page) use ($app) {
    /** @var $db \Doctrine\DBAL\Connection */
    $db = $app['db'];
    $customers = $db->createQueryBuilder()->select('*')
                                          ->from('Customer', 'c')
                                          ->setFirstResult(($page - 1) * 10)
                                          ->setMaxResults(10)
                                          ->execute();

    return $app['twig']->render('customers/index.twig', array(
        'customers' => $customers
    ));
})
->value('page', 1)
->assert('page', '\d+')
->bind('customers_list');

$app->get('customers/{id}/show', function($id) use ($app) {
    /** @var $db \Doctrine\DBAL\Connection */
    $db = $app['db'];
    /** @var $customer \Doctrine\DBAL\Driver\PDOStatement */
    $customer = $db->createQueryBuilder()->select('*')
                                         ->from('Customer', 'c')
                                         ->where('CustomerId = :customerId')
                                         ->setParameter('customerId', (int) $id)
                                         ->execute()
                                         ->fetchObject();

    return $app['twig']->render('customers/show.twig', array('customer' => $customer));
})
->assert('id', '\d+')
->bind('customer_show');

$app->get('customers/new', function(Silex\Application $app) {
    // Display the form to add new customers
})
->bind('customer_new');

$app->post('customers/create', function(Silex\Application $app) {
    // Handle the creation of new customers
})
->bind('customer_create');