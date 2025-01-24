<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // Specify the fillable fields for mass assignment
    protected $fillable = [
        'user_id',
        'video_document_id',
        'content',
    ];

    /**
     * Relationship: A comment belongs to a user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship: A comment belongs to a video document.
     */
    public function videoDocument()
    {
        return $this->belongsTo(VideosDocument::class,'videos_document_id');
    }
}