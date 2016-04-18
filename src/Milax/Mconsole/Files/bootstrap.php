<?php

use Milax\Mconsole\Files\Installer;

/**
 * Files module bootstrap file
 */
return [
    'name' => 'Files',
    'identifier' => 'mconsole-files',
    'description' => '',
    'menu' => [],
    'register' => [
        'middleware' => [],
        'providers' => [
            \Milax\Mconsole\Files\Provider::class,
        ],
        'aliases' => [],
        'bindings' => [],
        'dependencies' => [],
    ],
    'install' => function () {
        Installer::install();
    },
    'uninstall' => function () {
        Installer::uninstall();
    },
    'init' => function () {
        // ..
    },
];
