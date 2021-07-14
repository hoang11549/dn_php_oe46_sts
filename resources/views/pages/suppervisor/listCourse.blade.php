@extends('index')
@section( 'content')
<div class="container-fluid">       
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
               
                <h3 class="box-title">{{ trans('messages.ListCourse') }}</h3>
                 <div class="btn-container">
                     <a href="{{ route('listCourse.create')}}">
                    <button class="increase">+</button>
                </a>
                   </div>
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                            <tr>   
                                <th class="border-top-0">{{ trans('messages.Course') }}</th>
                                <th class="border-top-0">{{ trans('messages.StartDay') }}</th>
                                <th class="border-top-0">{{ trans('messages.EndDay') }}</th>
                                <th class="border-top-0">{{ trans('messages.read') }}</th>
                                <th class="border-top-0">{{ trans('messages.edit') }}</th>
                                <th class="border-top-0">{{ trans('messages.delete') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($courses as $course)       
                            <tr>
                                <td>{{ $course->name }}</td>
                                <td>{{ $course->start_date }}</td>
                                <td>{{ $course->duration }}</td>
                                <td><a href="{{ route('listCourse.show',$course->id)}}"><i class="fas fa-eye"></i></a></td>
                                <td><a href="#"><i class="fas fa-edit"></i></a></td>
                                <td>
                                    <form action="{{ route('listCourse.destroy',$course->id)}}"
                                        method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>  
</div>
@endsection
