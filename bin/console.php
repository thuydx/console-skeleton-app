<?php
require __DIR__.'/../vendor/autoload.php';

use Zend\Console\Console;
use App\Core\Application;
use DI\ContainerBuilder;
use App\Core\Dispatcher;
use Zend\Stdlib\Glob;
use Zend\Stdlib\ArrayUtils;
use Zend\ServiceManager\ServiceManager;
use Zend\ServiceManager\Config;

$config = [];
foreach (Glob::glob('config/{{*}}{{,*.local}}.php', Glob::GLOB_BRACE) as $file) {
    $config = ArrayUtils::merge($config, include $file);
}

$builder = new ContainerBuilder();
$builder->useAnnotations(true);
$builder->addDefinitions($config);
$container = $builder->build();

$configServiceManager = new Config($config['service_manager']);
$container->set("service_manager", new ServiceManager($configServiceManager));

$application = new Application(
    $config['app'],
    $config['version'],
    $config['routes'],
    Console::getInstance(),
    new Dispatcher($container)
);

$exit = $application->run();
exit($exit);
