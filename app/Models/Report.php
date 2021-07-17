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
        'data_time',
        'user_id',
        'course_id'
    ];
    protected $with = ['owner', 'course'];
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function commentReport()
    {
        return $this->morphMany(CommentReport::class, 'comment_parent');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
}
