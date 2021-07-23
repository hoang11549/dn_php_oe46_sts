<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\Subject\SubjectRepositoryInterface;
use App\Repository\Lesson\LessonRepositoryInterface;
use App\Repository\ReportLesson\ReportLessonRepositoryInterface;
use App\Repository\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isEmpty;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $subjectRepository;
    protected $lessonRepository;
    protected $reportLessonRepository;
    protected $userRepository;

    public function __construct(
        SubjectRepositoryInterface $subjectRepository,
        LessonRepositoryInterface $lessonRepository,
        ReportLessonRepositoryInterface $reportLessonRepository,
        UserRepositoryInterface $userRepository
    ) {
        $this->subjectRepository = $subjectRepository;
        $this->lessonRepository = $lessonRepository;
        $this->reportLessonRepository = $reportLessonRepository;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function showSub(Request $request)
    {
        $subject = $this->subjectRepository->getWith('lessons')->findOrFail($request->id);
        $date = $this->subjectRepository->getDay($subject, $request->startday);
        $idAuth = Auth::user()->id;
        $listReport = $this->subjectRepository->getNested('lessons', 'lessons.reportLesson')->findOrFail($request->id);
        $checked = [];
        foreach ($listReport->lessons as $value) {
            $pass = $this->lessonRepository->checkFunction($value, $idAuth);
            array_push($checked, $pass);
        }
        $checkSubject = $this->subjectRepository->checkComplete($checked);
        $arrayUser = $this->userRepository->findBeLongMany($subject, 'subject_id', 'users', 'user_id');
        if ($checkSubject == config('training.check.pass') && $arrayUser == []) {
            $subject->users()->attach($idAuth);
        }

        return view('pages.trainee.detailSubject', compact('subject', 'date', 'checked'));
    }
    public function show($id)
    {
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
        //
    }
}
