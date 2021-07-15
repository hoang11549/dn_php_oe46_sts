<?php

namespace App\Repository\Course;

use App\Models\Course;
use App\Repository\BaseRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Image;

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

    public function handleImg(Request $request, $CourseID, $nameImage)
    {
        if ($request->has($nameImage)) {
            $CoursImg = $request->file($nameImage);
            $path = 'assets/images/course/';
            $name = $CoursImg->getClientOriginalName();
            $storedPath = $CoursImg->move($path, $name);

            $reviewImage = Image::create([
                'imgable_id' => $CourseID,
                'imgable_type' => 'course',
                'url' => $path . $name,
            ]);
        }
    }
}
