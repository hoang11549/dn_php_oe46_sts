@extends('index')
@section( 'content')
<form class="bg-light p-4 m-4" action="{{ route('listCourse.store')}}" method='POST' enctype="multipart/form-data">
    @csrf
    <h2 >{{ trans('messages.AddCourse') }}</h2>
    <div class="form-group">
      <label for="yourmail">{{ trans('messages.nameCourse') }}</label>
      <input type="" class="form-control" id="yourmail" name="nameCourse" placeholder="{{ trans('messages.nameCourse') }}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlFile1">{{ trans('messages.ImageFile') }}</label>
        <input type="file" name="courseImage"  class="form-control-file" id="exampleFormControlFile1">
    </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">{{ trans('messages.Topic') }}</label>
    <select class="form-control" id="exampleFormControlSelect1" name="Topic">
        <option value="1">PHP</option>
        <option value="2">Ruby</option>
    </select>
    </div>
    <div class="form-group"> 
        <label class="col-md-4 control-label">{{ trans('messages.Datetime') }}:</label>                    
            <input type="date"class="form-control" id="datetime" name="datetime">
    </div>
    <div class="form-group">
        <label for="">{{ trans('messages.duration') }}</label>
        <input type="number" name="duration" class="form-control" id="yourmail" placeholder="enter day">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
