<?php

namespace Milax\Mconsole\FileArchive\Models;

use Illuminate\Database\Eloquent\Model;

class FileArchive extends Model
{
    use \CascadeDelete, \HasState, \HasUploads;
    
    protected $fillable = ['title', 'slug', 'description'];
}
