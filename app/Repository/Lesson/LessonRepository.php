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
    public function checkFunction($value, $idAuth)
    {
        $pass = config('training.check.dontCheck');
        foreach ($value->reportLesson as $listReport) {
            if ($listReport->status == config('training.check.pass') && $listReport->owner_id == $idAuth) {
                $pass = config('training.check.pass');
            }
        }

        return $pass;
    }
}
