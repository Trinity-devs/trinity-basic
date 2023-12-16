<?php

use trinity\console\{ConsoleInput, ConsoleKernel, ConsoleOutput, ErrorHandler};
use trinity\contracts\{ConsoleInputInterface,
    ConsoleKernelInterface,
    ConsoleOutputInterface,
    ContainerInterface,
    DatabaseConnectionInterface,
    FileHandlerInterface,
    HttpKernelInterface,
    RequestInterface,
    ResponseInterface,
    RoutesCollectionInterface,
    UriInterface,
    ViewRendererInterface};
use trinity\contracts\eventsContracts\{EventDispatcherInterface, MessageInterface};
use trinity\contracts\RouterInterface;
use trinity\db\DatabaseConnection;
use trinity\eventDispatcher\{EventDispatcher, Message};
use trinity\FileHandler;
use trinity\http\HttpKernel;
use trinity\Request;
use trinity\Response;
use trinity\router\Router;
use trinity\router\RoutesCollection;
use trinity\Uri;
use trinity\View;

return [
    ConsoleKernelInterface::class => function (ContainerInterface $container) {
        return new ConsoleKernel(
            $container->singleton(ConsoleInputInterface::class),
            $container->singleton(ConsoleOutputInterface::class),
            $container->singleton(ErrorHandler::class),
            $container->singleton(EventDispatcherInterface::class),
            $container,
        );
    },
    ViewRendererInterface::class => function (ContainerInterface $container) {
        return new View(
            $container->singleton(RouterInterface::class),
        );
    },
    DatabaseConnectionInterface::class => function () {
        return new DatabaseConnection(require_once __DIR__ . '/db.php');
    },
    RequestInterface::class => function () {
        return new Request($_SERVER, $_GET, $_POST);
    },
    UriInterface::class => function () {
        return new Uri($_SERVER);
    },
    ConsoleInputInterface::class => function () {
        return new ConsoleInput($_SERVER['argv'] ?? []);
    },
    RouterInterface::class => function (ContainerInterface $container) {
        return new Router(
            $container->singleton(RequestInterface::class),
            $container->singleton(UriInterface::class),
            $container->singleton(RoutesCollectionInterface::class),
            $container,
        );
    },
    ConsoleOutputInterface::class => ConsoleOutput::class,
    EventDispatcherInterface::class => EventDispatcher::class,
    HttpKernelInterface::class => HttpKernel::class,
    MessageInterface::class => Message::class,
    ResponseInterface::class => Response::class,
    RoutesCollectionInterface::class => RoutesCollection::class,
    FileHandlerInterface::class => function () {
        return new FileHandler(require_once __DIR__ . '/aliases.php');
    },
];
