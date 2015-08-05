<?php

namespace AppTest\Command;

use App\Command\Hello;
use PHPUnit_Framework_TestCase;

class HelloTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Hello
     */
    private $command;

    protected function setUp()
    {
        $this->command = new Hello();
    }

    public function testRun()
    {
        $route          = $this->getMockBuilder('ZF\Console\Route')
                               ->disableOriginalConstructor()
                               ->getMock();
        $consoleAdapter = $this->getMock('Zend\Console\Adapter\AdapterInterface');
        $container = $this->getMock('Zend\ServiceManager\ServiceLocatorInterface');

        $this->command->run($route, $consoleAdapter, $container);
    }
}
