<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportLesson extends Model
{
    use HasFactory;

    protected $table = 'report_lessons';

    protected $fillable = [
        'title',
        'content',
        'lesson_id',
        'owner_id',
        'status',
    ];

    public function lessons()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id', 'id');
    }
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }
}
