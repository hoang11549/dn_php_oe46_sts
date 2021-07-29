@extends('index')
@section( 'content')
<form class="bg-light p-4 m-4" action="{{ route('listSubject.store')}}" method='POST' enctype="multipart/form-data">
    @csrf
    <h2 >{{ trans('messages.AddCourse') }}</h2>
    <div class="form-group">
      <label for="yourmail">{{ trans('messages.subject') }}</label>
      <input type="" class="form-control" id="yourmail" name="name" placeholder="{{ trans('messages.subject') }}">
    </div>
    <div class="form-group">
        <label for="">{{ trans('messages.duration') }}</label>
        <input type="number" name="duration" class="form-control" id="yourmail" placeholder="enter day">
    </div>
    <div class="form-group">
        <label for="">{{ trans('messages.description') }}</label>
        <input type="text" name="description" class="form-control" id="yourmail">
    </div>
    <button type="submit" class="btn btn-primary">{{ trans('messages.Submit') }}</button>
</form>
@endsection
