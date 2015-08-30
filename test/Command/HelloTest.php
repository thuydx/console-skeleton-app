<?php

namespace AppTest\Command;

use App\Command\Hello;
use PHPUnit_Framework_TestCase;

class HelloTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->route = $this->getMockBuilder('ZF\Console\Route')
            ->disableOriginalConstructor()
            ->getMock();

        $this->consoleAdapter = $this->getMock('Zend\Console\Adapter\AdapterInterface');

        $this->container = $this->getMock('Zend\ServiceManager\ServiceLocatorInterface');

        $this->helloCommand = new Hello();
    }

    public function testHelloCommandShouldRun()
    {
        $this->helloCommand->run(
            $this->route,
            $this->consoleAdapter,
            $this->container
        );
    }
}
