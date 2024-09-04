<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    // Specify the custom table name
    protected $table = 'media';

    protected $fillable = ['name', 'mime-type', 'filepath', 'tags'];
}
