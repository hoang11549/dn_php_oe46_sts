<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $fillable = [
        'name',
        'start_date',
        'duration',
        'user_id',
        'topic_id',
        'status',
    ];
    protected $with = ['topic', 'owner'];

    public function topic()
    {
        return $this->belongsTo(Topic::class, 'topic_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_course', 'course_id', 'user_id')->withPivot('status');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'course_subject', 'course_id', 'subject_id');
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imgable');
    }

    public function commentReport()
    {
        return $this->morphMany(CommentReport::class, 'comment_parent');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function reportDaily()
    {
        return $this->hasMany(Report::class);
    }
}
