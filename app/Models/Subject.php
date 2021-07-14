<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $table = 'subjects';

    protected $fillable = [
        'name',
        'duration',
        'description',
    ];

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_subject', 'subject_id', 'user_id');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_subject', 'subject_id', 'course_id');
    }
}
