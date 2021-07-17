@extends('index')
@section('content')
<div class="container-fluid">
                  
    <!-- Start Page Content -->
      
    <!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-12">
            <div class="white-box">
                <div class="user-bg"> 
                    <div class="overlay-box">
                        <div class="user-content">
                            <a href="javascript:void(0)"><img src="{{ asset($user->image->url) }}"
                                    class="thumb-lg img-circle" alt="img"></a>
                            <h4 class="text-white mt-2">{{ trans('messages.UserName') }}</h4>
                            <h5 class="text-white mt-2">{{ $user->email }}</h5>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal form-material" 
                    action="{{ route('user.update', ['user' => $user->id]) }}" method='POST' enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                        <div class="form-group">
                            <label for="exampleFormControlFile1">{{ trans('messages.Avatar') }}</label>
                            <input type="file" name="avatar" class="form-control-file" >
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">{{ trans('messages.FullName') }}</label>
                            <div class="col-md-12 border-bottom p-0" >
                                <input type="text" name="name"
                                    class="form-control p-0 border-0" value="{{ $user->name }}"></div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="example-email" class="col-md-12 p-0">{{ trans('messages.Email') }}</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="email" value="{{ $user->email }}" readonly
                                    class="form-control p-0 border-0" name="email"
                                    id="example-email">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">{{ trans('messages.Address') }}</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" value="{{ $user->address }}" name="address"
                                    class="form-control p-0 border-0"> </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">{{ trans('messages.Age') }}</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" value="{{ $user->age }}" name ="age"
                                    class="form-control p-0 border-0"> </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="col-sm-12">
                                <button class="btn btn-success">{{ trans('messages.UpPro') }}</button>
                                <input type="reset"class="btn btn-primary" value="Reset">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
    <!-- Row -->
      
</div>
@endsection
