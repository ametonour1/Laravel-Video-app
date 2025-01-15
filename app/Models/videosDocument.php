<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class videosDocument extends Model
{
    use HasFactory;

    protected $table = 'videosDocument';

    protected $fillable = [
        'title',
        'file_path',
        'description',
        'views',
    ];
}
