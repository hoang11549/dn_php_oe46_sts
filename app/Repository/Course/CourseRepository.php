<?php

namespace App\Repository\Course;

use App\Models\Course;
use App\Repository\BaseRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\DB;

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

        return $date->toFormattedDateString();
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

    public function search($request, $coloum)
    {
        $output = '';
        $courses = DB::table('courses')->where($coloum, 'LIKE', '%' . $request->search . '%')->get();
        if ($courses) {
            foreach ($courses as $key => $course) {
                $output .= '<tr>
                    <td>' . $course->name . '</td>
                    <td>' . $course->start_date . '</td>
                    <td>' . $course->duration . '</td>' .
                    '<td><a href="listCourse/' . $course->id . '" ><i class="fas fa-eye"></i></a></td>
                    <td><a href="listCourse/' . $course->id . 'edit/" }}><i class="fas fa-edit"></i></a></td>
                    <td>
                        <form action="listCourse/' . $course->id . '"
                            method=POST>
                                ' . csrf_field() . '
                    ' . method_field('DELETE') . ' 
                                <button type="submit" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                        </form>
                    </td>
                    </tr>';
            }
        }

        return Response($output);
    }
    public function updateStatus($userID, $course_id)
    {
        DB::table('user_course')->where(['user_id' => $userID, 'course_id' => $course_id]);
    }
}
