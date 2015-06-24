<?php
require __DIR__.'/../vendor/autoload.php';

use Zend\Console\Console;
use ZF\Console\Application;
use ZF\Console\Dispatcher;
use Zend\Stdlib\Glob;
use Zend\Stdlib\ArrayUtils;

$config = [];
foreach (Glob::glob('config/{{*}}{{,*.local}}.php', Glob::GLOB_BRACE) as $file) {
    $config = ArrayUtils::merge($config, include $file);
}

$application = new Application(
    $config['app'],
    $config['version'],
    $config['routes'],
    Console::getInstance(),
    new Dispatcher()
);

$exit = $application->run();
exit($exit);
