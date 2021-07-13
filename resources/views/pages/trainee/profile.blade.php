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
                            <a href="javascript:void(0)"><img src="{{ asset('images/users/genu.jpg') }}"
                                    class="thumb-lg img-circle" alt="img"></a>
                            <h4 class="text-white mt-2">{{ trans('messages.UserName') }}</h4>
                            <h5 class="text-white mt-2">info@myadmin.com</h5>
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
                    <form class="form-horizontal form-material">
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">{{ trans('messages.FullName') }}</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" placeholder="Johnathan Doe"
                                    class="form-control p-0 border-0"> </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="example-email" class="col-md-12 p-0">{{ trans('messages.Email') }}</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="email" placeholder="johnathan@admin.com"
                                    class="form-control p-0 border-0" name="example-email"
                                    id="example-email">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">{{ trans('messages.Password') }}</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="password" value="password" class="form-control p-0 border-0">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">{{ trans('messages.Phone') }}</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" placeholder="123 456 7890"
                                    class="form-control p-0 border-0">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">{{ trans('messages.Address') }}</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" placeholder="{{ trans('messages.Address') }}"
                                    class="form-control p-0 border-0"> </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">{{ trans('messages.Age') }}</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" placeholder="{{ trans('messages.Age') }}"
                                    class="form-control p-0 border-0"> </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="col-sm-12">
                                <button class="btn btn-success">{{ trans('messages.UpPro') }}</button>
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
