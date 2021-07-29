@extends('index')
@section( 'content')
<div class="container-fluid">       
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <div class="input-group">
                    <div class="form-outline">
                        <input type="search" id="search" name='search'placeholder="{{ trans('messages.Search') }}" />
                        <input type="hidden" class="routeSearch" value="{{ Route('search') }}" />
                    </div>
                </div>
                <h3 class="box-title">{{ trans('messages.ListCourse') }}</h3>
                 <div class="btn-container">
                     <a href="{{ route('listSubject.create')}}">
                    <button class="increase">+</button>
                </a>
                   </div>
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                            <tr>   
                                <th class="border-top-0">{{ trans('messages.subject') }}</th>
                                <th class="border-top-0">{{ trans('messages.duration') }}</th>
                                <th class="border-top-0">{{ trans('messages.edit') }}</th>
                                <th class="border-top-0">{{ trans('messages.delete') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subject as $sub)       
                            <tr>
                                <td>{{ $sub->name }}</td>
                                <td>{{ $sub->duration }}</td>
                                <td><a href="{{ route('listSubject.edit', ['listSubject' => $sub->id]) }}"><i class="fas fa-edit"></i></a></td>
                                <td>
                                    <form action="{{ route('listSubject.destroy',$sub->id)}}"
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
                    <nav aria-label="Page navigation example">
                        {!! $subject->links() !!}
                      </nav>
                </div>
            </div>
        </div>
    </div>  
</div>
@endsection
