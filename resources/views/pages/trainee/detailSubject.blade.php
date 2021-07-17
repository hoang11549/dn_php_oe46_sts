@extends('index')
@section( 'content')
<!--card-->
<div class="blog-card">
    <div class="meta">
      <div class="photo" style="background-image: url(https://storage.googleapis.com/chydlx/codepen/blog-cards/image-1.jpg)"></div>
      <ul class="details">
        <li class="date">{{ trans('messages.duration') }}{{ $subject->duration }}</li>
       </ul>
    </div>
    <div class="description">
      <h1>{{ $subject->name }}</h1>
      <h2>{{ trans('messages.EndDay') }}: {{ $date }}</h2>
      <p> {{ $subject->description }}.</p>
    </div>
  </div>
<!--lesson--->

<div class="white-box">
    <h1>{{ trans('messages.Lesson') }}</h1>
    @foreach($subject->lessons as $lesson)
        <div class="lesson">
            <div class="lesson-preview">
            <h6>{{ trans('messages.lesson') }}</h6>
            <h4>{{ $lesson->name }}</h4>
            <a href="#">{{ trans('messages.WriteReport') }}<i class="fas fa-chevron-right"></i></a>
            </div>
            <div class="lesson-info">
                <h6>{{ $lesson->url_document }}</h6>
            </div>
        </div>  
    @endforeach
</div>
@endsection
