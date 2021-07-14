<?php

namespace App\Repository\Course;

use App\Models\Course;
use App\Repository\BaseRepository;
use Carbon\Carbon;

class CourseRepository extends BaseRepository implements CourseRepositoryInterface
{
    public function __construct(Course $course)
    {
        parent::__construct($course);
    }

    public function endDay($day, $duration)
    {
        $date = Carbon::create($day);
        $date->addDays($duration);

        return $date;
    }
}
