@extends('index')
@section( 'content')
<div class="container-fluid">       
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">{{ trans('messages.lesson') }}</h3>
                 <div class="btn-container">
                     <a href="{{ route('lesson.create')}}">
                    <button class="increase">+</button>
                </a>
                   </div>
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                            <tr>   
                                <th class="border-top-0">{{ trans('messages.lesson') }}</th>
                                <th class="border-top-0">{{ trans('messages.subject') }}</th>
                                <th class="border-top-0">{{ trans('messages.edit') }}</th>
                                <th class="border-top-0">{{ trans('messages.delete') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lesson as $les)       
                            <tr>
                                <td>{{ $les->name }}</td>
                                <td>{{ $les->subject->name }}</td>
                                <td><a href="{{ route('lesson.edit', ['lesson' => $les->id]) }}"><i class="fas fa-edit"></i></a></td>
                                <td>
                                    <form action="{{ route('lesson.destroy',$les->id)}}"
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
