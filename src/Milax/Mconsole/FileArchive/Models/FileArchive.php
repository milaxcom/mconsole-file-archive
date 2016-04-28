<?php

namespace Milax\Mconsole\FileArchive\Models;

use Illuminate\Database\Eloquent\Model;

class FileArchive extends Model
{
    use \Cacheable, \HasUploads;
    
    protected $fillable = ['name', 'path'];
}
