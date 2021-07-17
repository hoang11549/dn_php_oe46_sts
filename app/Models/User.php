<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'age',
        'address',
        'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'user_subject', 'user_id', 'subject_id');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'user_course', 'user_id', 'course_id')->withPivot('status');
    }

    public function course()
    {
        return $this->hasMany(Course::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imgable');
    }

    public function reportLesson()
    {
        return $this->hasMany(ReportLesson::class);
    }
    public function comments()
    {
        return $this->hasMany(CommentReport::class, 'user_id', 'id');
    }

    public function scopeIsTrainer($query)
    {
        return $query->where('role', 'Supervisor');
    }

    public function scopeIsTrainee($query)
    {
        return $query->where('role', 'Trainee');
    }

    public function scopeFree($query)
    {
        return $query->where('status', 0);
    }
}
