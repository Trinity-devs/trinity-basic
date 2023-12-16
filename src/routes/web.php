<?php

use trinity\contracts\ContainerInterface;
use trinity\contracts\RoutesCollectionInterface;
use trinity\router\RoutesCollection;
use src\controllers\SiteController;

/**
 * @var ContainerInterface $container
 * @var RoutesCollection $routesCollection
 */

$routesCollection = $container->singleton(RoutesCollectionInterface::class);

$routesCollection->get('/index', SiteController::class . '::actionIndex');
$routesCollection->get('/', SiteController::class . '::actionIndex');
