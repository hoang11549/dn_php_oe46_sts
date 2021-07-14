<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Repository\Topic\TopicRepositoryInterface;
use App\Repository\Course\CourseRepositoryInterface;
use App\Repository\Subject\SubjectRepositoryInterface;


class CourseController extends Controller
{
    protected $courseRepository;
    protected $subjectRepository;
    protected $topicRepository;

    public function __construct(
        CourseRepositoryInterface $courseRepository,
        SubjectRepositoryInterface $subjectRepository,
        TopicRepositoryInterface $topicRepository
    ) {
        $this->courseRepository = $courseRepository;
        $this->subjectRepository = $subjectRepository;
        $this->topicRepository = $topicRepository;
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
        $subject = $this->subjectRepository->getAll();

        return view('pages.suppervisor.createCourse', compact('subject'));
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
        $course =  $this->courseRepository->find($courses->id);

        $listSubject = $request->subject;
        foreach ($listSubject as $list) {
            $course->tags()->attach($list);
        }
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
        $course = $this->courseRepository->findOrFail($id)->with('topic')->first();
        if ($course) {
            $arraySubject = $this->subjectRepository->findBeLongMany($course, 'course_id');
            $imageLink = $course->image->url;
            $endday = $this->courseRepository->endDay($course->start_date, $course->duration);

            return view('pages.trainee.detailCourse', compact('course', 'arraySubject', 'imageLink', 'endday'));
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
        $course = $this->courseRepository->findOrFail($id)->with('topic')->first();
        $listTopic = $this->topicRepository->getAll();
        if ($course) {
            $arraySubject = $this->subjectRepository->findBeLongMany($course, 'course_id');

            return view('pages.suppervisor.editCourse', compact('course', 'arraySubject', 'listTopic'));
        }

        return view('pages.suppervisor.createCourse');
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
        $inputDate = strtotime($request->dateStart);
        $reviewData = [
            "name"  =>  $request->nameCourse,
            "start_date" => date('Y-m-d', $inputDate),
            "duration" => $request->duration,
            "user_id" => 1,
            "topic_id" => $request->Topic,
        ];
        $courses = $this->courseRepository->update($id, $reviewData);
        $this->courseRepository->handleImg($request, $courses->id, 'courseImage');

        return redirect()->route('listCourse.index');
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

    public  function search(Request $request)
    {
        if ($request->ajax()) {
            return $this->courseRepository->search($request, 'name');
        }
    }
}
