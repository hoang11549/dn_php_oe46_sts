<?php

namespace App\Repository\Course;

use Illuminate\Http\Request;
use App\Repository\RepositoryInterface;
use App\Models\Image;

interface CourseRepositoryInterface extends RepositoryInterface
{
    public function endDay($day, $duration);

    public function handleImg(Request $image, $arrayCourse, $nameImage);

    public function search($request, $coloum);

    public function updateStatus($userID, $course_id);

    public function countMonth($month, $year);
}
