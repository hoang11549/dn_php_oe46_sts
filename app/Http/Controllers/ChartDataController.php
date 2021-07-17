<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use App\Repository\Course\CourseRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChartDataController extends Controller
{
    protected $courseRepository;
    public function __construct(
        CourseRepositoryInterface $courseRepository
    ) {
        $this->courseRepository = $courseRepository;
    }

    public function getMonthlyPostData(Request $request)
    {
        $monthly_post_count_array = [];
        $monthArray = array();
        $month_array = getAllMonth();
        $month_name_array = array();
        $year = Carbon::now();
        $year = $year->format('Y');
        if (!empty($month_array)) {
            foreach ($month_array as $month_no => $month_name) {
                if ($request->chooseYear != '') {
                    $year = $request->chooseYear;
                }
                $monthly_post_count = $this->courseRepository->countMonth($month_no, $year);
                array_push($monthly_post_count_array, $monthly_post_count);
                array_push($month_name_array, $month_name);
            }
        }
        $max_no = max($monthly_post_count_array);
        $max = maxNo($max_no);
        $monthly_post_data_array = array(
            'months' => $month_name_array,
            'count_data' => $monthly_post_count_array,
            'max' => $max
        );

        return $monthly_post_data_array;
    }

    public function index()
    {
        $courseYear = Course::orderBy('start_date', 'ASC')->get();
        $yearNow = Carbon::now();
        $yearNow = $yearNow->format('Y');
        $yearArray = getYear($courseYear);

        return view('pages.suppervisor.chart', compact('yearArray', 'yearNow'));
    }
}
