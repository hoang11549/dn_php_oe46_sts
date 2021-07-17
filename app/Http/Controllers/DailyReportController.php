<?php

namespace App\Http\Controllers;

use App\Repository\Course\CourseRepositoryInterface;
use App\Repository\DailyReport\DailyReportRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DailyReportController extends Controller
{
    protected $reportDailyRepository;
    protected $courseRepository;

    public function __construct(
        CourseRepositoryInterface $courseRepository,
        DailyReportRepositoryInterface $reportDailyRepository
    ) {
        $this->reportDailyRepository = $reportDailyRepository;
        $this->courseRepository = $courseRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $daily = $this->reportDailyRepository->findWhere('course_id', $request->course);
        $owner = [];
        foreach ($daily as $key => $value) {
            $owner[$key] = $value->owner->name;
        }


        return view('pages.suppervisor.listDailyReport', compact('daily', 'owner'));
    }

    public function historyReport()
    {
        $daily = $this->reportDailyRepository->findWhere('user_id', Auth::user()->id);

        return view('pages.trainee.historyReport', compact('daily'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $arrayCourse = $this->courseRepository->findBeLongMany($user, 'user_id', 'courses', 'course_id');
        $value = max($arrayCourse);

        return view('pages.trainee.reportDaily', compact('value'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $authId = Auth::user()->id;
        $inputDate = strtotime($request->datetime);
        if (Auth::user()->status == 0) {
            $data = [
                "data_time" => date('Y-m-d', $inputDate),
                "title" => $request->title,
                "description" => $request->doingDate,
                "problem" => $request->problem,
                "user_id" => $authId,
            ];
        } else {
            $data = [
                "data_time" => date('Y-m-d', $inputDate),
                "title" => $request->title,
                "description" => $request->doingDate,
                "problem" => $request->problem,
                "user_id" => $authId,
                "course_id" => $request->Course,
            ];
        }
        $this->reportDailyRepository->create($data);

        return redirect()->route('listCourse.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $report = $this->reportDailyRepository->findOrFail($id);

        return view('pages.trainee.detaiReportDaily', compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->reportDailyRepository->delete($id)) {
            return redirect()->route('reportDaily.index');
        }

        return back()->withError('notDelete');
    }
}
