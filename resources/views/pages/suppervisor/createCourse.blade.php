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
    <select class="form-control" id="exampleFormControlSelect1" name="topic">
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
        <label for="">{{ trans('messages.subject') }}</label>
            <ul class="cus-checkbox">
                <div class='for-disabled'>
            @foreach ($subject as $subjects)
                    <li><input type="checkbox" name="subject[]" id="checkbox{{ $subjects->name }}"
                        value="{{ $subjects->id }}" class="enabled">
                        <label for="checkbox{{ $subjects->name }}">{{ $subjects->name }}</label>
                    </li>
            @endforeach
                </div>
            </ul>
            <table id="table" 
            data-toggle="table"
            data-search="true"
            data-filter-control="true" 
            data-show-export="true"
            data-click-to-select="true"
            data-toolbar="#toolbar"
            data-pagination="true"
            >
        <thead>
            <tr>
                <th data-field="state" data-checkbox="true"></th>
                <th data-field="ex" data-filter-control="input" data-sortable="true">{{ trans('messages.Id') }}</th>
                <th data-field="examen" data-filter-control="select" data-sortable="true">{{ trans('messages.FullName') }}</th>
                <th data-field="date" data-filter-control="select" data-sortable="true">{{ trans('messages.Create-At') }}</th>
                <th data-field="prenom" data-sortable="true">{{ trans('messages.Email') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $key => $user)
                <tr >
                    <td class="bs-checkbox "><input data-index={{ $user->id }}
                        value={{ $user->id }} name="user[]" type="checkbox"></td>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <button type="submit" class="btn btn-primary">{{ trans('messages.Submit') }}</button>
</form>
@endsection
