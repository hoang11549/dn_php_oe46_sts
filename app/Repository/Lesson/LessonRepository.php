<?php

namespace App\Repository\Lesson;

use App\Models\Lesson;
use App\Repository\BaseRepository;

class LessonRepository extends BaseRepository implements LessonRepositoryInterface
{
    public function __construct(Lesson $lesson)
    {
        parent::__construct($lesson);
    }
}
