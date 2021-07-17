<?php

namespace App\Http\Controllers;

use App\Repository\Lesson\LessonRepositoryInterface;
use App\Repository\ReportLesson\ReportLessonRepositoryInterface;
use App\Repository\Subject\SubjectRepositoryInterface;
use App\Repository\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $subjectRepository;
    protected $lessonRepository;
    protected $userRepository;

    public function __construct(
        SubjectRepositoryInterface $subjectRepository,
        LessonRepositoryInterface $lessonRepository,
        UserRepositoryInterface $userRepository
    ) {
        $this->subjectRepository = $subjectRepository;
        $this->lessonRepository = $lessonRepository;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        if (Gate::allows('check-role')) {
            $lesson = $this->lessonRepository->getWith(['subject'])->get();

            return view('pages.suppervisor.listLesson', compact('lesson'));
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
        $subject = $this->subjectRepository->getAll();

        return view('pages.suppervisor.createLesson', compact('subject'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            "name"  =>  $request->name,
            "subject_id" => $request->subject,
            "url_document" => $request->url,
        ];
        $lesson = $this->lessonRepository->create($data);

        return redirect()->route('lesson.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lesson = $this->lessonRepository->getWith(['subject'])->findOrFail($id);
        $subject = $this->subjectRepository->getAll();

        return view('pages.suppervisor.editLesson', compact('lesson', 'subject'));
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
        $data = [
            "name"  =>  $request->name,
            "subject_id" => $request->subject,
            "url_document" => $request->url,
        ];
        $lesson = $this->lessonRepository->update($id, $data);

        return redirect()->route('lesson.index');
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
