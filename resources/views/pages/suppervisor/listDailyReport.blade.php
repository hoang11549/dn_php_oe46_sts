@extends('index')
@section( 'content')
<div class="container-fluid">       
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">{{ trans('messages.ListReport') }}</h3>
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                            <tr>   
                                <th class="border-top-0">{{ trans('messages.Title') }}</th>
                                <th class="border-top-0">{{ trans('messages.Datetime') }}</th>
                                <th class="border-top-0">{{ trans('messages.author') }}</th>
                                <th class="border-top-0">{{ trans('messages.read') }}</th>
                                <th class="border-top-0">{{ trans('messages.delete') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($daily as $key=>$report)       
                            <tr>
                                <td>{{ $report->title }}</td>
                                <td>{{ $report->data_time }}</td>
                                <td>{{ $owner[$key] }}</td>
                                <td><a href="{{ route('reportDaily.show', ['reportDaily' => $report->id]) }}"><i class="fas fa-eye"></i></a></td>
                                <td>
                                    <form action="{{ route('reportDaily.destroy',$report->id)}}"
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
