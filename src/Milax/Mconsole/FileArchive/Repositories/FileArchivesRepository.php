<?php 

namespace Milax\Mconsole\FileArchive\Repositories;

use Milax\Mconsole\Repositories\EloquentRepository;
use Milax\Mconsole\FileArchive\Contracts\Repositories\FileArchivesRepository as Repository;

class FileArchivesRepository extends EloquentRepository implements Repository
{
    public $model = \Milax\Mconsole\FileArchive\Models\FileArchive::class;
}