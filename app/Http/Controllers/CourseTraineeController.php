<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\Course\CourseRepositoryInterface;
use App\Repository\User\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;

class CourseTraineeController extends Controller
{
    protected $courseRepository;
    protected $userRepository;

    public function __construct(
        CourseRepositoryInterface $courseRepository,
        UserRepositoryInterface $userRepository
    ) {
        $this->courseRepository = $courseRepository;
        $this->userRepository = $userRepository;
    }

    public function homeTrainee($id)
    {
        $user = $this->userRepository->findOrFail($id);
        $arrayCourse = $this->courseRepository->findBeLongMany($user, 'user_id', 'courses', 'course_id');
        $arrayLink = [];
        $arrayHome = [];
        foreach ($arrayCourse as $key => $value) {
            $imageLink = $arrayCourse[$key]->image;
            $arrayLink['urlImg'] = $arrayCourse[$key]->image->url;
            $course = $value->with('owner')->first();
            $arrayLink['nameOwner'] = $course->owner->name;
            $arrayLink['nameCourse'] = $value->name;
            $arrayLink['id'] = $value->id;
            array_push($arrayHome, $arrayLink);
        }

        return  $arrayHome = [];
    }
}
