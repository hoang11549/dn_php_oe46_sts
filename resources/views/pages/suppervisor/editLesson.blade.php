@extends('index')
@section( 'content')
<form class="bg-light p-4 m-4" action="{{ route('lesson.update',['lesson'=>$lesson->id])}}" method='POST' >
    @csrf
    {{ method_field('PUT') }}
    <h2 >{{ trans('messages.addlesson') }}</h2>
    <div class="form-group">
      <label for="yourmail">{{ trans('messages.lesson') }}</label>
      <input type="" class="form-control" id="yourmail" name="name" value="{{ $lesson->name }}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">{{ trans('messages.subject') }}</label>
        <select class="form-control" id="exampleFormControlSelect1" name="subject">
            @foreach($subject as $sbj)
                <option {{$lesson->subject->id==$sbj->id ? 'selected' : '' }}
                         value="{{ $sbj->id }}">{{ $sbj->name }}</option> 
            @endforeach
        </select>
        </div>
    <div class="form-group">
        <label for="">url Document</label>
        <input type="text" name="url" class="form-control" id="yourmail" value="{{ $lesson->url_document }}">
    </div>
    <button type="submit" class="btn btn-primary">{{ trans('messages.Submit') }}</button>
</form>
@endsection
