<?php

namespace AppTest\Core;

use App\Core\Application;
use App\Core\Dispatcher;
use DI\ContainerBuilder;
use PHPUnit_Framework_TestCase;
use Zend\Console\Console;
use Zend\ServiceManager\Config;
use Zend\ServiceManager\ServiceManager;

class ApplicationTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Application
     */
    private $application;

    protected function setUp()
    {
        $config = [
            'app' => "this is my app",
            "test" => "prova",
            "version" => "0.0.1",
            'routes' => [
                [
                    'name' => 'hello',
                    'route' => "--name=",
                    'short_description' => "Good morning!! This is a beautiful day",
                    "handler" => ['App\Command\Hello', 'run'],
                ],
            ],
            "service_manager" => [
                "invokables" => [],
                "factories" => [],
            ],
        ];

        $builder = new ContainerBuilder();
        $builder->useAnnotations(true);
        $builder->addDefinitions($config);
        $container = $builder->build();

        $configServiceManager = new Config($config['service_manager']);
        $container->set("service_manager", new ServiceManager($configServiceManager));

        $this->application = new Application(
            $config['app'],
            $config['version'],
            $config['routes'],
            Console::getInstance(),
            new Dispatcher($container)
        );
    }

    public function testNameOfApplicationIntoTheOutput()
    {
        ob_start();
        $this->application->run();
        $content = ob_get_clean();

        $this->assertRegExp("/this is my app/", $content);
    }
}
