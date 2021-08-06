<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use App\Notifications\NotifiCourse;
use Illuminate\Http\Request;
use App\Repository\Topic\TopicRepositoryInterface;
use App\Repository\Course\CourseRepositoryInterface;
use App\Repository\Subject\SubjectRepositoryInterface;
use App\Repository\User\UserRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Pusher\Pusher;

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
            $arrayHome = $this->trainee->homeTrainee();

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
        $listTopic = $this->topicRepository->getAll();
        $subject = $this->subjectRepository->getAll();
        $users = $this->userRepository->findWhere('status', config('training.check.dontActive'));
        $supervisor = $this->userRepository->findWhere('role', 'Supervisor');

        return view('pages.suppervisor.createCourse', compact('subject', 'users', 'listTopic', 'supervisor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputDate = strtotime($request->datetime);
        $reviewData = [
            "name"  =>  $request->nameCourse,
            "start_date" => date('Y-m-d', $inputDate),
            "duration" => $request->duration,
            "user_id" => Auth::user()->id,
            "topic_id" => $request->topic,
        ];
        $courses = $this->courseRepository->create($reviewData);
        $course =  $this->courseRepository->find($courses->id);
        $this->courseRepository->handleImg($request, $courses->id, 'courseImage');
        if (!$course) {
            return back()->withError('notCreate');
        }
        $listSubject = $request->subject;
        foreach ($listSubject as $list) {
            $course->subjects()->attach($list);
        }
        $listUser = $request->user;
        $data = [
            'nameCourse' => $request->nameCourse,
            'type' => config('training.Notify.courseCreate'),
            'Auth' => Auth::user()->name,
        ];

        foreach ($listUser as $list) {
            $update = ["status" => (config('training.check.active')),];
            $user = $this->userRepository->update($list, $update);
            $course->users()->attach($list);
            $user = $this->userRepository->findOrFail($list);
            $user->notify(new NotifiCourse($data));
        }
        $dataPusher = [
            'nameCourse' => $request->nameCourse,
            'type' => config('training.Notify.courseCreate'),
            'listUser' => $listUser,
            'Auth' => Auth::user()->name,
        ];
        $options = array(
            'cluster' => 'ap1',
            'encrypted' => true
        );
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $pusher->trigger('NotificationEvent', 'send-message-', $dataPusher);

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
        $course = $this->courseRepository->findOrFail($id);
        $arrayUser = $this->userRepository->findBeLongMany($course, 'course_id', 'users', 'user_id');
        if ($course) {
            $arraySubject = $this->subjectRepository->findBeLongMany($course, 'course_id', 'subjects', 'subject_id');
            $imageLink = $course->image->url;
            $endday = $this->courseRepository->endDay($course->start_date, $course->duration);
            $date = $this->subjectRepository->startDay($arraySubject, $course->start_date);
            $check = $this->subjectRepository->checkdate($arraySubject, $course->start_date);
            $UserCheckSbj = [];
            $auId = Auth::user()->id;
            $chekcCourse = true;

            foreach ($arraySubject as $key => $arr) {
                $User = $this->userRepository->findBeLongMany($arr, 'subject_id', 'users', 'user_id');

                $CheckSbj = userComplete($auId, $User);


                array_push($UserCheckSbj, $CheckSbj);

                if ($CheckSbj == false) {
                    $chekcCourse = false;
                }
            }
            $status = trans('messages.Active');
            if ($chekcCourse == true && $course->status == config('training.check.finish')) {
                $status = trans('messages.complete'); //complete course
            } elseif ($chekcCourse == false && $course->status == config('training.check.finish')) {
                $status = trans('messages.uncomplete'); //dont complete course
            }

            return view(
                'pages.trainee.detailCourse',
                compact(
                    'course',
                    'arraySubject',
                    'imageLink',
                    'endday',
                    'date',
                    'check',
                    'arrayUser',
                    'UserCheckSbj',
                    'status',
                    'auId',
                )
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
        $course = $this->courseRepository->findOrFail($id);
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

        return back()->withError('notDelete');
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            return $this->courseRepository->search($request, 'name');
        }
    }
    public function kickUser($id, $courseId)
    {
        $course =  $this->courseRepository->findOrFail($courseId);
        if ($course) {
            if ($course->users()->detach($id)) {
                $update = ["status" => (config('training.check.dontActive')),];
                $user = $this->userRepository->update($id, $update);

                return redirect()->route('listCourse.show', ['listCourse' => $courseId]);
            }

            return back()->withError('notFound');
        }

        return back()->withError('notFound');
    }

    public function finishCourse($id)
    {
        $course =  $this->courseRepository->findOrFail($id);
        $arrayUser = $this->userRepository->findBeLongMany($course, 'course_id', 'users', 'user_id');
        $Data = ["status" => config('training.check.finish'),];
        foreach ($arrayUser as $arr) {
            $complete = ["status" => config('training.check.dontActive'),];
            $arr->id = $this->userRepository->update($arr->id, $complete);
        }
        $cousrUpdate = $this->courseRepository->update($id, $Data);

        return redirect()->route('listCourse.index');
    }
}
