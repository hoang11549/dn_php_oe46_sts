<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ReportLesson;
use App\Repository\ReportLesson\ReportLessonRepositoryInterface;
use App\Repository\Lesson\LessonRepositoryInterface;

class ReportLessonController extends Controller
{
    protected $reportLessonRepository;

    public function __construct(
        ReportLessonRepositoryInterface $reportLessonRepository
    ) {
        $this->reportLessonRepository = $reportLessonRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listReport = $this->reportLessonRepository->getwithfind('status', 0, ['lessons', 'owner'])->get();

        return view('pages.suppervisor.listReportLesson', compact('listReport'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $lessonId = $request->id;

        return view('pages/trainee/reportLesson', compact('lessonId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $authID = Auth::user()->id;
        $reportData = [
            "title"  =>  $request->Title,
            "content" => $request->Report,
            "owner_id" => $authID,
            "lesson_id" => $request->lessonId,
            "status" => config('training.check.dontCheck'),
        ];
        if ($this->reportLessonRepository->create($reportData)) {
            return back()->with("success", trans('messages.review_created'));
        } else {
            return back()->with("error", trans('messages.error_created'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $report = $this->reportLessonRepository->findOrFail($id);

        return view('pages/suppervisor/detailReport', compact('report'));
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

    public function uploadImageToDir(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('images'), $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/' . $fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
    public function checkPass(Request $request)
    {
        $reportData = [
            "status" => config('training.check.pass'),
        ];
        $courses = $this->reportLessonRepository->update($request->id, $reportData);
        if ($courses == false) {
            return back()->with("error", trans('messages.error_updated'));
        }

        return redirect()->route('reportLesson.index');
    }
}
