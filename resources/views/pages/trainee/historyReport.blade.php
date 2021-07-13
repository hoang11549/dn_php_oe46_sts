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
                                <th class="border-top-0">{{ trans('messages.Course') }}</th>
                                <th class="border-top-0">{{ trans('messages.Datetime') }}</th>
                                <th class="border-top-0">{{ trans('messages.Title') }}</th>
                                <th class="border-top-0">{{ trans('messages.read') }}</th>
                                <th class="border-top-0">{{ trans('messages.edit') }}</th>
                                <th class="border-top-0">{{ trans('messages.delete') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Deshmukh</td>
                                <td>Prohaska</td>
                                <td>@Genelia</td>
                                <td><a href="#"></a><i class="fas fa-eye"></i></a></td>
                                <td><a href="#"><i class="fas fa-edit"></i></a></td>
                                <td><a href="#"><i class="far fa-trash-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>Deshmukh</td>
                                <td>Gaylord</td>
                                <td>@Ritesh</td>
                                <td><a href="#"></a><i class="fas fa-eye"></i></a></td>
                                <td><a href="#"><i class="fas fa-edit"></i></a></td>
                                <td><a href="#"><i class="far fa-trash-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>Sanghani</td>
                                <td>Gusikowski</td>
                                <td>@Govinda</td>
                                <td><a href="#"></a><i class="fas fa-eye"></i></a></td>
                                <td><a href="#"><i class="fas fa-edit"></i></a></td>
                                <td><a href="#"><i class="far fa-trash-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>Roshan</td>
                                <td>Rogahn</td>
                                <td>@Hritik</td>
                                <td><a href="#"></a><i class="fas fa-eye"></i></a></td>
                                <td><a href="#"><i class="fas fa-edit"></i></a></td>
                                <td><a href="#"><i class="far fa-trash-alt"></i></a></td>
                            </tr>
                            <tr>
                                <td>Joshi</td>
                                <td>Hickle</td>
                                <td>@Maruti</td>
                                <td><a href="#"></a><i class="fas fa-eye"></i></a></td>
                                <td><a href="#"><i class="fas fa-edit"></i></a></td>
                                <td><a href="#"><i class="far fa-trash-alt"></i></a></td>
                            </tr>
                         
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>  
</div>
@endsection
