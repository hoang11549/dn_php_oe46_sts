@extends('index')
@section( 'content')
<div class="container-fluid">       
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <div class="table-responsive">
                    <div class="card">
                        <div class="card-header">
                            {{ trans('messages.Update') }}
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user.update', $user->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                  <label for="exampleInputEmail1">{{ trans('messages.FullName') }}</label>
                                  <input value="{{ $user->name }}" name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">{{ trans('messages.Age') }}</label>
                                  <input type="text" value="{{ $user->age }}" name="age" class="form-control" id="exampleInputPassword1" placeholder="Enter age">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ trans('messages.Address') }}</label>
                                    <input type="text" value="{{ $user->address }}" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter address">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">{{ trans('messages.Email') }}</label>
                                    <input type="email" value="{{ $user->email }}" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">{{ trans('messages.Role') }}</label>
                                    <input type="text" value="{{ $user->role }}" name="role" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter role">
                                  </div>
                                <button type="submit" class="btn btn-primary">{{ trans('messages.Save') }}</button>
                              </form>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>  
</div>
@endsection
