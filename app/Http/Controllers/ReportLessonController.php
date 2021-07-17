<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ReportLesson;
use App\Notifications\NotifiCourse;
use App\Notifications\NotiReportLesson;
use App\Repository\ReportLesson\ReportLessonRepositoryInterface;
use App\Repository\Lesson\LessonRepositoryInterface;
use Carbon\Carbon;
use Pusher\Pusher;

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
        $listReport = $this->reportLessonRepository->findWhere('status', 0);

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
        $date = $request->date;
        $idSubject = $request->idSubject;

        return view('pages/trainee/reportLesson', compact('lessonId', 'date', 'idSubject'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $reportData = [
            "title"  =>  $request->Title,
            "content" => $request->Report,
            "owner_id" => Auth::user()->id,
            "lesson_id" => $request->lessonId,
            "status" => config('training.check.dontCheck'),
        ];
        if ($this->reportLessonRepository->create($reportData)) {
            return redirect()->route('showSbj', ['id' => $request->idSubject, 'dateStart' => $request->date])
                ->with("success", trans('messages.review_created'));
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
        $timeNow = Carbon::now('Asia/Ho_Chi_Minh');

        return view('pages/suppervisor/detailReport', compact('report', 'timeNow'));
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
        $report = $this->reportLessonRepository->findOrFail($request->id);
        $user = $report->owner;
        $data = [
            'nameLesson' => $report->lessons->name,
            'type' => config('training.Notify.reportLesson'),
            'Auth' => Auth::user()->name,
            'userId' => $report->owner->id,
        ];
        $user->notify(new NotiReportLesson($data));
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
        $pusher->trigger('ReportLessonEvents', 'report-Lesson-check-', $data);

        return redirect()->route('reportLesson.index');
    }
}
