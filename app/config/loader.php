<?php

use Phalcon\Loader;

$loader = new Loader();

/**
 * Register Namespaces
 */
$loader->registerNamespaces([
    'App\Models' => APP_PATH . '/common/models/',
    'App\Library'        => APP_PATH . '/common/library/',
]);

/**
 * Register module classes
 */
$loader->registerClasses([
    'App\Modules\Frontend\Module' => APP_PATH . '/modules/frontend/Module.php',
    'App\Modules\Cli\Module'      => APP_PATH . '/modules/cli/Module.php'
]);

$loader->register();
