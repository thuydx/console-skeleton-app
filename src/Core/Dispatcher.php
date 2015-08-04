<?php
namespace App\Core;

use ZF\Console\Dispatcher as ZfDispatcher;
use ZF\Console\Route;
use Zend\Console\Adapter\AdapterInterface as ConsoleAdapter;
use Zend\Console\ColorInterface as Color;

class Dispatcher extends ZfDispatcher
{
    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function dispatch(Route $route, ConsoleAdapter $console)
    {
        $name = $route->getName();
        if (! isset($this->commandMap[$name])) {
            $console->writeLine('');
            $console->writeLine(sprintf('Unhandled command "%s" invoked', $name), Color::WHITE, Color::RED);
            $console->writeLine('');
            $console->writeLine('The command does not have a registered handler.');
            return 1;
        }

        $callable = $this->commandMap[$name];

        if (! is_callable($callable) && is_string($callable)) {
            $callable = new $callable();
            if (! is_callable($callable)) {
                throw new RuntimeException(sprintf(
                    'Invalid command class specified for "%s"; class must be invokable',
                    $name
                ));
            }
            $this->commandMap[$name] = $callable;
        }
        $return = $this->container->call($callable, [
            $route,
            $console,
            $this->container
        ]);

        return (int) $return;
    }
}
