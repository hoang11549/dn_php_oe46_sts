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
                                <th class="border-top-0">{{ trans('messages.lesson') }}</th>
                                <th class="border-top-0">{{ trans('messages.FullName') }}</th>
                                <th class="border-top-0">{{ trans('messages.Create-At') }}</th>
                                <th class="border-top-0">{{ trans('messages.read') }}</th>
                             
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($listReport as $report)
                                <tr>
                                    <td>{{ $report->lessons->name }}</td>
                                    <td>{{ $report->owner->name }}</td>
                                    <td>{{ $report->created_at }}</td>
                                    <td><a href="{{ route('reportLesson.show', ['reportLesson' => $report->id]) }}">
                                    <i class="fas fa-eye"></i></a>
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
