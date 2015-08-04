<?php

namespace AppTest\Core;

use App\Core\Dispatcher;
use PHPUnit_Framework_TestCase;
use Zend\ServiceManager\ServiceManager;

class DispatcherTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Dispatcher
     */
    private $dispatcher;

    protected function setUp()
    {
        $container = $this->getMock('Zend\ServiceManager\ServiceLocatorInterface');
        $this->dispacher = new Dispatcher($container);
    }

    public function testDispatch()
    {
        $route          = $this->getMockBuilder('ZF\Console\Route')
                               ->disableOriginalConstructor()
                               ->getMock();
        $consoleAdapter = $this->getMock('Zend\Console\Adapter\AdapterInterface');

        $this->dispacher->dispatch($route, $consoleAdapter);
    }
}
