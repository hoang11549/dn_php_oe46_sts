<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Repository\Course\CourseRepositoryInterface;
use Carbon\Carbon;

class CourseController extends Controller
{
    protected $courseRepository;
    public function __construct(CourseRepositoryInterface $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = $this->courseRepository->listPaginate(config('training.paginate_course'));

        return view('pages.suppervisor.listCourse', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.suppervisor.createCourse');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputDate = strtotime($request->dateStart);
        $reviewData = [
            "name"  =>  $request->nameCourse,
            "start_date" => date('Y-m-d', $inputDate),
            "duration" => $request->duration,
            "user_id" => 1,
            "topic_id" => $request->Topic,
        ];
        $courses = $this->courseRepository->create($reviewData);
        $this->courseRepository->handleImg($request, $courses->id, 'courseImage');

        return redirect()->route('listCourse.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detailCourse = $this->courseRepository->findOrFail($id)->with('topic')->first();
        if ($detailCourse) {
            return view('pages.trainee.detailCourse', compact('detailCourse'));
        }

        return back()->withError('notFound');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->courseRepository->delete($id)) {
            return redirect()->route('listCourse.index');
        }

        return redirect()->route('listCourse.index')->withError('notDelete');
    }
}
