@extends('index')
@section( 'content')
<form class="bg-light p-4 m-4" action="{{ route('listSubject.update',['listSubject'=>$subject->id])}}"
   method='POST' >
    @csrf
    {{ method_field('PUT') }}
    <h2 >{{ trans('messages.AddCourse') }}</h2>
    <div class="form-group">
      <label for="yourmail">{{ trans('messages.Subject') }}</label>
      <input type="" class="form-control" id="yourmail" name="name" value="{{ $subject->name }}">
    </div>
    <div class="form-group">
        <label for="">{{ trans('messages.duration') }}</label>
        <input type="number" name="duration" class="form-control" id="yourmail" value="{{ $subject->duration }}">
    </div>
    <div class="form-group">
      <label for="">{{ trans('messages.description') }}</label>
      <input type="text" value="{{ $subject->description }}" name="description" class="form-control" id="yourmail">
    </div>
    <button type="submit" class="btn btn-primary">{{ trans('messages.Submit') }}</button>
</form>
@endsection
