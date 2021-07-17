@extends('index')
@section( 'content')
<form class="bg-light p-4 m-4" action="{{ route('lesson.store')}}" method='POST' enctype="multipart/form-data">
    @csrf
    <h2 >{{ trans('messages.addlesson') }}</h2>
    <div class="form-group">
      <label for="yourmail">{{ trans('messages.lesson') }}</label>
      <input type="" class="form-control" id="yourmail" name="name" placeholder="{{ trans('messages.lesson') }}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">{{ trans('messages.subject') }}</label>
        <select class="form-control" id="exampleFormControlSelect1" name="subject">
            @foreach($subject as $sbj)
                <option value="{{ $sbj->id }}">
                    {{ $sbj->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">{{ trans('messages.subject') }}</label>
        <input type="text" name="url" class="form-control" id="yourmail" placeholder="url Document">
    </div>
    <button type="submit" class="btn btn-primary">{{ trans('messages.Submit') }}</button>
</form>
@endsection
