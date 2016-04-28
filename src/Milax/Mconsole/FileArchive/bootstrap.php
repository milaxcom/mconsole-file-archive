<?php

use Milax\Mconsole\FileArchive\Installer;

/**
 * Files module bootstrap file
 */
return [
    'name' => 'File Archive',
    'identifier' => 'mconsole-file-archive',
    'description' => 'mconsole::files.module.description',
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
        app('API')->menu->push('tools', 'files_all', [
            'name' => 'All files',
            'translation' => 'files.menu.list.name',
            'url' => 'files',
            'description' => 'files.menu.list.description',
            'route' => 'mconsole.files.index',
            'visible' => true,
            'enabled' => true,
        ]);
        app('API')->menu->push('tools', 'files_form', [
            'name' => 'Create page',
            'translation' => 'files.menu.create.name',
            'url' => 'files/create',
            'description' => 'files.menu.create.description',
            'route' => 'mconsole.files.create',
            'visible' => false,
            'enabled' => true,
        ]);
        app('API')->menu->push('tools', 'files_update', [
            'name' => 'Edit files',
            'translation' => 'files.menu.update.name',
            'description' => 'files.menu.update.description',
            'route' => 'mconsole.files.edit',
            'visible' => false,
            'enabled' => true,
        ]);
        app('API')->menu->push('tools', 'files_delete', [
            'name' => 'Delete files',
            'translation' => 'files.menu.delete.name',
            'description' => 'files.menu.delete.description',
            'route' => 'mconsole.files.destroy',
            'visible' => false,
            'enabled' => true,
        ]);
    },
];
