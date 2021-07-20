<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\Subject\SubjectRepositoryInterface;
use App\Repository\Lesson\LessonRepositoryInterface;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $subjectRepository;
    protected $lessonRepository;

    public function __construct(
        SubjectRepositoryInterface $subjectRepository,
        LessonRepositoryInterface $lessonRepository
    ) {
        $this->subjectRepository = $subjectRepository;
        $this->lessonRepository = $lessonRepository;
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

        return view('pages.trainee.detailSubject', compact('subject', 'date'));
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
