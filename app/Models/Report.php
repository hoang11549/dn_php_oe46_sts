<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'reports';

    protected $fillable = [
        'title',
        'description',
        'problem',
        'user_id',
        'course_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function commentReport()
    {
        return $this->morphMany(CommentReport::class, 'comment_parent');
    }
}
