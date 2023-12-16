<?php

use trinity\contracts\FileHandlerInterface;
use trinity\contracts\HttpKernelInterface;
use trinity\DIContainer;

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once __DIR__ . '/../vendor/autoload.php';

$container = DIContainer::createContainer(require_once __DIR__ . '/../config/di-container.php');

const PROJECT_ROOT = __DIR__ . '/../';

require_once $container->singleton(FileHandlerInterface::class)->getAlias('@src') . 'routes/web.php';

$kernel = $container->singleton(HttpKernelInterface::class);

$response = $kernel->handle();

$response->send();
