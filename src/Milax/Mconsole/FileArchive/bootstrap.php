<?php

use Milax\Mconsole\FileArchive\Installer;

/**
 * filearchives module bootstrap file
 */
return [
    'name' => 'File Archive',
    'identifier' => 'mconsole-file-archive',
    'description' => 'mconsole::filearchives.module',
    'register' => [
        'middleware' => [],
        'providers' => [
            \Milax\Mconsole\FileArchive\Provider::class,
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
        app('API')->menu->push([
            'name' => 'mconsole::filearchives.menu',
            'url' => 'filearchives',
            'visible' => true,
            'enabled' => true,
        ], 'filearchives', 'tools.files');
        
        app('API')->acl->register([
            ['GET', 'filearchives', 'mconsole::filearchives.acl.index', 'filearchives'],
            ['GET', 'filearchives/create', 'mconsole::filearchives.acl.create'],
            ['POST', 'filearchives', 'mconsole::filearchives.acl.store'],
            ['GET', 'filearchives/{filearchives}/edit', 'mconsole::filearchives.acl.edit'],
            ['PUT', 'filearchives/{filearchives}', 'mconsole::filearchives.acl.update'],
            ['GET', 'filearchives/{filearchives}', 'mconsole::filearchives.acl.show'],
            ['DELETE', 'filearchives/{filearchives}', 'mconsole::filearchives.acl.destroy'],
        ]);
    },
];
