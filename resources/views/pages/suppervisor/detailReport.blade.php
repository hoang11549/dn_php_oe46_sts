@extends('index')
@section('content')
<div class="detai-report">
    <h1>{{ $report->title }}</h1>
	<h3>{{ $report->created_at }}</h3>
    @can('check-role')
    <a href="{{ route('reportLesson.checkPass',['status'=>config('training.check.pass'),'id' => $report->id])}}">
        <button class="btn btn-primary">{{ trans('messages.Pass') }}</button>
    </a>
    @endcan
    <div class="container">
        <div class="card white-box p-3">{!! $report->content !!}</div>
    </div>
</div>
<div class="card white-box p-0">
 <div class="card-body">
        <h3 class="box-title mb-0">{{ trans('messages.Comments') }}</h3>
    </div>
        @include('layout.commentDisplay', 
        [
        'comments' => $report->comments,
         'report_id' => $report->id ,
         'timeNow'=>$timeNow])
        <hr />
        <h4>{{ trans('messages.AddComment') }}</h4>
        <form method="post" id="comment" action="{{ route('comments.store') }}">
            @csrf
            <div class="form-group">
                <textarea class="form-control" name="content"></textarea>
                <input type=hidden name="report_id" value="{{ $report->id }}" />
            </div>
            <div class="form-group">
                <input type=submit class="btn btn-success" value="{{ trans('messages.AddComment') }}" />
            </div>
        </form>
</div>
@endsection
