<?php

namespace Milax\Mconsole\FileArchive;

use Milax\Mconsole\Contracts\Modules\ModuleInstaller;

class Installer implements ModuleInstaller
{    
    public static function install()
    {
        //
    }
    
    public static function uninstall()
    {
        $repository = new \Milax\Mconsole\FileArchive\FileArchiveRepository(\Milax\Mconsole\FileArchive\Models\FileArchive::class);
        foreach ($repository->get() as $instance) {
            $instance->delete();
        }
    }
}
