@extends('index')
@section( 'content')

<div class="blog-card">
    <div class="meta">
      <div class="photo" style="background-image: url(https://storage.googleapis.com/chydlx/codepen/blog-cards/image-1.jpg)"></div>
      <ul class="details">
        <li class="author"><a href="#">John Doe</a></li>
        <li class="date">{{ $course->start_date }}</li>
        <li class="tags">
          <ul>
            <li><a href="#">{{ $course->topic->name }}</a></li>    
          </ul>
        </li>
      </ul>
    </div>
    <div class="description">
      <h1>{{ $course->name }}(Active)</h1>
      <h2>{{ $course->duration }}</h2>
      <h2>{{ trans('messages.author') }}:John Doe</h2>
    </div>
  </div>
  <div class="row">
    <!-- .col -->
    <div class="col-md-12 col-lg-8 col-sm-12">
        <div class="white-box">
            <h2>{{ trans('messages.CourseSb') }}</h2>
        <!--TEst Line time-------->
    <div class="wrapper">
        <div class="center-line">
            <a href="#" class="scroll-icon"><i class="fas fa-caret-up"></i></a>
        </div>
        @foreach($arraySubject as $key => $subject)
            @if($key==0 || $key%2==0)
                <div class="row row-1">
            @else    
                <div class="row row-2">
        @endif
                <section>
                <i class="icon far fa-circle"></i>
                    <div class="details">
                    <span class="title">{{ $subject->name }}</span>
                    <span>{{$subject->duration}} {{ trans('messages.day') }}</span>
                    </div>
                    <p>{{ $subject->description }}</p>
                    <div class="bottom">
                    <a href="#">{{ trans('messages.read') }}</a>
                    </div>
                </section>
            </div>
            @endforeach
            <div class="row row-2">
            <section>
                <i class="icon far fa-check-circle"></i>
                <div class="details">
                    <span class="title">Title of Section 6</span>
                    <span>6th Jan 2021</span>
                </div>
                <p>Lorem ipsum dolor sit ameters consectetur adipisicing elit. Sed qui veroes praesentium maiores, sint eos vero sapiente voluptas debitis dicta dolore.</p>
                <div class="bottom">
                    <a href="#">Read more</a>
                </div>
                </section>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12 col-sm-12">
        <div class="card white-box p-0">
            <div class="card-heading">
                <h3 class="box-title mb-0"> {{ trans('messages.trainee') }}</h3>
            </div>
            <div class="card-body">
                <ul class="chatonline">
                    <li>  
                        <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                src="{{ asset('images/users/varun.jpg') }}" alt="user-img" class="img-circle">
                            <div class="ms-2">
                                <span class="text-dark">Varun Dhavan</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                src="{{ asset('images/users/genu.jpg') }}" alt="user-img" class="img-circle">
                            <div class="ms-2">
                                <span class="text-dark">Genelia
                                    Deshmukh </span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                src="{{ asset('images/users/ritesh.jpg') }}" alt="user-img" class="img-circle">
                            <div class="ms-2">
                                <span class="text-dark">Ritesh
                                    Deshmukh </span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                src="{{ asset('images/users/arijit.jpg') }}" alt="user-img" class="img-circle">
                            <div class="ms-2">
                                <span class="text-dark">Arijit
                                    Sinh </span>
                            </div>
                        </a>
                    </li>
                    <li>       
                        <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                src="{{ asset('images/users/govinda.jpg') }}" alt="user-img"
                                class="img-circle">
                            <div class="ms-2">
                                <span class="text-dark">Govinda
                                    Star</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                src="{{ asset('images/users/hritik.jpg') }}" alt="user-img" class="img-circle">
                            <div class="ms-2">
                                <span class="text-dark">John
                                    Abraham</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /.col -->
</div>
@endsection
