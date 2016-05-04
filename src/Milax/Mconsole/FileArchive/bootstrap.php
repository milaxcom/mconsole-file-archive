<?php

use Milax\Mconsole\FileArchive\Installer;

/**
 * filearchives module bootstrap file
 */
return [
    'name' => 'File Archive',
    'identifier' => 'mconsole-file-archive',
    'description' => 'mconsole::filearchives.module.description',
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
            'name' => 'File archives',
            'translation' => 'filearchives.menu.list.name',
            'url' => 'filearchives',
            'visible' => true,
            'enabled' => true,
        ], 'filearchives', 'tools');
        
        app('API')->acl->register([
            ['GET', 'filearchives', 'filearchives.acl.index', 'filearchives'],
            ['GET', 'filearchives/create', 'filearchives.acl.create'],
            ['POST', 'filearchives', 'filearchives.acl.store'],
            ['GET', 'filearchives/{filearchives}/edit', 'filearchives.acl.edit'],
            ['PUT', 'filearchives/{filearchives}', 'filearchives.acl.update'],
            ['GET', 'filearchives/{filearchives}', 'filearchives.acl.show'],
            ['DELETE', 'filearchives/{filearchives}', 'filearchives.acl.destroy'],
        ]);
    },
];
