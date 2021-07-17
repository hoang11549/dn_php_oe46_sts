@extends('index')
@section( 'content')
<!--card-->
<div class="blog-card">
    <div class="meta">
      <div class="photo" style="background-image: url(https://storage.googleapis.com/chydlx/codepen/blog-cards/image-1.jpg)"></div>
      <ul class="details">
       </ul>
    </div>
    <div class="description">
      <h1>{{ $subject->name }}</h1>
      <h2>{{ trans('messages.duration') }}: {{ $subject->duration }} {{ trans('messages.day') }}</h2>
      <p> {{ $subject->description }}.</p>
    </div>
  </div>
<!--lesson--->

<div class="white-box">
    <h1>{{ trans('messages.lesson') }}</h1>
    @if($checked==[])
    <h3>{{ trans('messages.donthavelesson') }}</h3>
    @else
        @foreach($subject->lessons as $key=> $lesson)
            <div class="lesson">
                <div class="lesson-preview">
                <h6>{{ trans('messages.lesson') }}</h6>
                <h4>{{ $lesson->name }}</h4>
                <a href="{{ route('reportLesson.create', ['id' => $lesson->id]) }}">
                  {{ trans('messages.WriteReport') }}<i class="fas fa-chevron-right"></i></a>
                </div>
                <div class="lesson-info">
                    <h6>{{ $lesson->url_document }}</h6>
                    @if($checked[$key]==config('training.check.pass'))
                      <h3>{{ trans('messages.complete') }}</h3>
                    @else
                      <h3>{{ trans('messages.uncomplete') }}</h3>
                    @endif
                </div>
            </div>  
        @endforeach
    @endif
</div>
@endsection
