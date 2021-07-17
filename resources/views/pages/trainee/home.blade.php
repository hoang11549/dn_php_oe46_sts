@extends('index')
@section( 'content')
<div class="container-fluid">

    <!-- RECENT SALES -->

    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box">
                <div class="d-md-flex mb-3">
                    <h3 class="box-title mb-0"> {{ trans('messages.YourCourse') }}</h3>
                </div>
                    <div class="table-responsive">
                        <div class="list-course">
                          <ul class="flex-card-list">
                            @foreach($arrayHome as $key => $arrHome)
                            <li>
                              <div class="flex-card">
                                <div class="card-img">
                                  <a href="{{ route('listCourse.show',$arrHome['id']) }}">
                                    <img src="{{ asset($arrHome['urlImg'])}}">
                                  </a>
                                </div>
                                <div class="card-content">
                                  <a href="{{ route('listCourse.show',$arrHome['id']) }}">
                                    <h3>{{ $arrHome['nameCourse'] }}</h3>
                                    <div class="text">
                                    <p>{{ $arrHome['nameOwner'] }}</p>
                                    </div>
                                  </a>
                                </div>
                              </div>
                            </li>
                            @endforeach
                        </ul>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
