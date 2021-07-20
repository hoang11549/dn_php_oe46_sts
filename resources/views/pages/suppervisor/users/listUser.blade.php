@extends('index')
@section( 'content')
<div class="container-fluid">       
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">{{ trans('messages.ListUser') }}</h3>
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                            <tr>   
                                <th class="border-top-0">{{ trans('messages.Stt') }}</th>
                                <th class="border-top-0">{{ trans('messages.NameUser') }}</th>
                                <th class="border-top-0">{{ trans('messages.Age') }}</th>
                                <th class="border-top-0">{{ trans('messages.Address') }}</th>
                                <th class="text-center border-top-0" colspan="3">{{ trans('messages.Process') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($users))
                            @foreach ($users as $key => $user)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->age }}</td>
                                    <td>{{ $user->address }}</td>
                                    <td><a href="{{ route('user.show', $user->id) }}"><i class="fas fa-edit">
                                        <button type="button" class="btn btn-info">{{  trans('messages.Detail')  }}</button>
                                    </i></a></td>
                                    <td><a href="{{ route('user.edit', $user->id) }}"><i class="fas fa-edit">
                                        <button type="button" class="btn btn-primary">{{  trans('messages.Edit')  }}</button>
                                    </i></a></td>
                                    <td>
                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">
                                                {{  trans('messages.delete')  }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>  
</div>
{{ $users->links() }}
@endsection
