<?php

namespace App\Repository\Lesson;

use App\Repository\RepositoryInterface;

interface LessonRepositoryInterface extends RepositoryInterface
{
    public function checkFunction($value, $idAuth);
}
