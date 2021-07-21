<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Repository\Topic\TopicRepositoryInterface;
use App\Repository\Course\CourseRepositoryInterface;
use App\Repository\Subject\SubjectRepositoryInterface;
use App\Repository\User\UserRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\CourseTraineeController;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    protected $courseRepository;
    protected $subjectRepository;
    protected $topicRepository;
    protected $userRepository;
    protected $trainee;

    public function __construct(
        CourseRepositoryInterface $courseRepository,
        SubjectRepositoryInterface $subjectRepository,
        TopicRepositoryInterface $topicRepository,
        UserRepositoryInterface $userRepository,
        CourseTraineeController $trainee
    ) {
        $this->courseRepository = $courseRepository;
        $this->subjectRepository = $subjectRepository;
        $this->topicRepository = $topicRepository;
        $this->userRepository = $userRepository;
        $this->trainee = $trainee;
        $this->middleware('auth');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        if (Gate::allows('check-role')) {
            $courses = $this->courseRepository->listPaginate(config('training.paginate_course'));

            return view('pages.suppervisor.listCourse', compact('courses'));
        } else {
            $arrayHome = [];
            $arrayHome = $this->trainee->homeTrainee($id);
            return view('pages.trainee.home', compact('arrayHome'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subject = $this->subjectRepository->getAll();
        $users = $this->userRepository->findWhere('role', 'Supervisor');

        return view('pages.suppervisor.createCourse', compact('subject', 'users'));
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
            "topic_id" => $request->topic,
        ];
        $courses = $this->courseRepository->create($reviewData);
        $course =  $this->courseRepository->find($courses->id);
        $listSubject = $request->subject;
        foreach ($listSubject as $list) {
            $course->subjects()->attach($list);
        }
        $listUser = $request->user;
        foreach ($listUser as $list) {
            $course->users()->attach($list);
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
        $course = $this->courseRepository->getWith(['topic', 'owner'])->findOrFail($id);
        if ($course) {
            $arraySubject = $this->subjectRepository->findBeLongMany($course, 'course_id', 'subjects', 'subject_id');
            $imageLink = $course->image->url;
            $endday = $this->courseRepository->endDay($course->start_date, $course->duration);
            $date = $this->subjectRepository->startDay($arraySubject, $course->start_date);
            $check = $this->subjectRepository->checkdate($arraySubject, $course->start_date);

            return view(
                'pages.trainee.detailCourse',
                compact('course', 'arraySubject', 'imageLink', 'endday', 'date', 'check')
            );
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
        $course = $this->courseRepository->getWith('topic')->findOrFail($id);
        $listTopic = $this->topicRepository->getAll();
        if ($course) {
            $arraySubject = $this->subjectRepository->findBeLongMany($course, 'course_id', 'subjects', 'subject_id');

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

    public function search(Request $request)
    {
        if ($request->ajax()) {
            return $this->courseRepository->search($request, 'name');
        }
    }
}
