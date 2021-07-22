<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $table = 'lessons';

    protected $fillable = [
        'name',
        'url_document',
        'subject_id',
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }
    public function reportLesson()
    {
        return $this->hasMany(ReportLesson::class);
    }
}
