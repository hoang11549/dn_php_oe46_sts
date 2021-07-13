<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'images';

    protected $fillable = [
        'imgable_type',
        'url',
        'imgable_id',
    ];

    public function imgable()
    {
        return $this->morphTo();
    }
}
