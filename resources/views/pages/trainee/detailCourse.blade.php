@extends('index')
@section( 'content')

<div class="blog-card">
    <div class="meta">
      <div class="photo" style="background-image: url({{ asset($imageLink) }})"></div>
      <ul class="details">
        <li class="author"><a href="#">{{ $course->owner->name }}</a></li>
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
      <h2>{{ $course->duration }} {{ trans('messages.day') }}</h2>
      <h2>{{ trans('messages.EndDay') }}: {{ $endday }}</h2>
      <h2>{{ trans('messages.author') }}:{{ $course->owner->name }}</h2>
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
        
            <div class="row row-1">
                <div class="row-x"> 
                    <i class="icon fas fa-play-circle"></i>
               <div class="details">
                <span class="title"></span>
            </div>
            <p></p>
        </div>
            </div>
     
        @foreach($arraySubject as $key => $subject)
            @if($key==0 || $key%2==0)
                <div class="row row-1">
            @else    
                <div class="row row-2">
            @endif
                    <section>
                        @if($check[$key]==true)
                            <i class="icon far fa-check-circle"></i>  
                        @else
                            <i class="icon far fa-circle"></i>
                        @endif
                        <div class="details">
                            <span class="title">{{ $subject->name }}</span>
                            <span>{{ trans('messages.EndDay') }} {{$date[$key]}} </span>
                        </div>
                        <p>{{ $subject->description }}</p>
                        <div class="bottom">
                            <a href="{{ route('showSbj', [$subject->id,$date[$key] ]) }}">{{ trans('messages.read') }}</a>
                        </div>
                    </section>
                </div>
        @endforeach
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
                    @foreach ($arrayUser as $arrU)
                        <li>  
                            <a href="javascript:void(0)" class="d-flex align-items-center">
                                <img src="{{ asset( $arrU->image->url) }}" alt="user-img" class="img-circle">
                                <div class="ms-2">
                                    <span class="text-dark">{{ $arrU->name }}</span>
                                </div>
                                <div class="ms-1">
                                    <form action="{{ route('kickUser',['id'=>$arrU->id,'courseId'=>$course->id])}}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit">
                                            <i class="fas fa-user-minus"></i>
                                        </button>
                                    </form>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <!-- /.col -->
</div>
@endsection
