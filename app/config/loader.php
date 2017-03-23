<?php

use Phalcon\Loader;

$loader = new Loader();

/**
 * Register Namespaces
 */
$loader->registerNamespaces([
    'Phal\Models' => APP_PATH . '/common/models/',
    'Phal'        => APP_PATH . '/common/library/',
]);

/**
 * Register module classes
 */
$loader->registerClasses([
    'Phal\Modules\Frontend\Module' => APP_PATH . '/modules/frontend/Module.php',
    'Phal\Modules\Cli\Module'      => APP_PATH . '/modules/cli/Module.php'
]);

$loader->register();
