<?php
$composerAutoload = dirname(__DIR__) . '/vendor/autoload.php';
if (is_file($composerAutoload)) {
    /** @var \Composer\Autoload\ClassLoader $loader */
    $loader = require($composerAutoload);
}

$loader->addPsr4('rockunit\\session\\', __DIR__);

require(dirname(__DIR__) . '/src/polyfills.php');

date_default_timezone_set('UTC');

define('ROCKUNIT_RUNTIME', __DIR__ . '/runtime');