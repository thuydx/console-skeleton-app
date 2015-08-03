<?php

namespace App\Core;

use InvalidArgumentException;
use Traversable;
use Zend\Console\Adapter\AdapterInterface as Console;
use Zend\Console\Console as DefaultConsole;
use ZF\Console\RouteCollection;
use ZF\Console\Application as ZfApplication;

class Application extends ZfApplication
{
    public function __construct(
        $name,
        $version,
        $routes,
        Console $console = null,
        $dispatcher = null
    ) {
        parent::__construct(
            $name,
            $version,
            $routes,
            $console,
            $dispatcher
        );
    }

    protected function setupHelpCommand(RouteCollection $routeCollection, $dispatcher)
    {
        return parent::setupHelpCommand($routeCollection, $dispatcher);
    }

    protected function setupVersionCommand(RouteCollection $routeCollection, $dispatcher)
    {
        return parent::setupVersionCommand($routeCollection, $dispatcher);
    }

    protected function setupAutocompleteCommand(RouteCollection $routeCollection, $dispatcher)
    {
        return parent::setupAutocompleteCommand($routeCollection, $dispatcher);
    }
}
