@extends('index')
@section( 'content')
<!--card-->
<div class="blog-card">
    <div class="meta">
      <div class="photo" style="background-image: url(https://storage.googleapis.com/chydlx/codepen/blog-cards/image-1.jpg)"></div>
      <ul class="details">
        <li class="author"><a href="#">John Doe</a></li>
        <li class="date">Aug. 24, 2015</li>
       </ul>
    </div>
    <div class="description">
      <h1>Laravel</h1>
      <h2>Opening a door to the future</h2>
      <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad eum dolorum architecto obcaecati enim dicta praesentium, quam nobis! Neque ad aliquam facilis numquam. Veritatis, sit.</p>

    </div>
  </div>
<!--lesson--->

<div class="white-box">
    <h1>{{ trans('messages.Lesson') }}</h1>
    <div class="lesson">
        <div class="lesson-preview">
        <h6>{{ trans('messages.lesson') }}</h6>
        <h4>JavaScript Fundamentals</h4>
        <a href="#">View all chapters <i class="fas fa-chevron-right"></i></a>
        </div>
        <div class="lesson-info">
            <div class="progress-container">
                <div class="progress"></div>
                <span class="progress-text">
                    6/9 Challenges
                </span>
            </div>
            <h4>JavaScript Fundamentals</h4>
            <h6>link</h6>
        </div>
    </div>  
    <div class="lesson">
        <div class="lesson-preview">
        <h6>{{ trans('messages.lesson') }}</h6>
        <h4>JavaScript Fundamentals</h4>
        <a href="#">View all chapters <i class="fas fa-chevron-right"></i></a>
        </div>
        <div class="lesson-info">
            <div class="progress-container">
                <div class="progress"></div>
                <span class="progress-text">
                    6/9 Challenges
                </span>
            </div>
            <h4>JavaScript Fundamentals</h4>
            <h6>link</h6>
        </div>
    </div>  
</div>
@endsection
