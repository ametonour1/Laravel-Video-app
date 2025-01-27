<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class videosDocument extends Model
{
    use HasFactory;

    protected $table = 'videosDocument';

    protected $fillable = [
        'user_id',
        'thumbnail',
        'title',
        'file_path',
        'description',
        'duration',
        'views',
    ];
}
