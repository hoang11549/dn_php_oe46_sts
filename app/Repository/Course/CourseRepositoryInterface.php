<?php

namespace App\Repository\Course;

use App\Repository\RepositoryInterface;

interface CourseRepositoryInterface extends RepositoryInterface
{
    public function endDay($day, $duration);
}
