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
        app('API')->menu->push('tools', 'filearchives_all', [
            'name' => 'All file archives',
            'translation' => 'filearchives.menu.list.name',
            'url' => 'filearchives',
            'description' => 'filearchives.menu.list.description',
            'route' => 'mconsole.filearchives.index',
            'visible' => true,
            'enabled' => true,
        ]);
        app('API')->menu->push('tools', 'filearchives_form', [
            'name' => 'Create file archive',
            'translation' => 'filearchives.menu.create.name',
            'url' => 'filearchives/create',
            'description' => 'filearchives.menu.create.description',
            'route' => 'mconsole.filearchives.create',
            'visible' => false,
            'enabled' => true,
        ]);
        app('API')->menu->push('tools', 'filearchives_update', [
            'name' => 'Edit file archives',
            'translation' => 'filearchives.menu.update.name',
            'description' => 'filearchives.menu.update.description',
            'route' => 'mconsole.filearchives.edit',
            'visible' => false,
            'enabled' => true,
        ]);
        app('API')->menu->push('tools', 'filearchives_delete', [
            'name' => 'Delete file archives',
            'translation' => 'filearchives.menu.delete.name',
            'description' => 'filearchives.menu.delete.description',
            'route' => 'mconsole.filearchives.destroy',
            'visible' => false,
            'enabled' => true,
        ]);
    },
];
