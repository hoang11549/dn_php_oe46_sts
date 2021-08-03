<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentReport extends Model
{
    use HasFactory;

    protected $table = 'comment_report';

    protected $fillable = [
        'report_id',
        'user_id',
        'content',
        'comment_parent_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(CommentReport::class, 'comment_parent_id');
    }

    public function report()
    {
        return $this->belongsTo(ReportLesson::class, 'report_id', 'id');
    }
}
