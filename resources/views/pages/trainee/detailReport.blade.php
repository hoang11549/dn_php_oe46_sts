@extends('index')
@section('content')
<div class="detai-report">
<h1>Info on Hover!</h1>

	<h2>22/13/2021</h2>

	<div class="card white-box p-0">You can use this for lots of different purposes	. You can display links:</div>
</div>
<div class="card white-box p-0">
    <div class="card-body">
        <h3 class="box-title mb-0">{{ trans('messages.Comments') }}</h3>
    </div>
    <div class="comment-widgets">
        <!-- Comment Row -->
        <div class="d-flex flex-row comment-row p-3 mt-0">
            <div class="p-2"><img src="{{ asset('images/users/varun.jpg') }}" alt="user" width="50" class="rounded-circle"></div>
            <div class="comment-text ps-2 ps-md-3 w-100">
                <h5 class="font-medium">James Anderson</h5>
                <span class="mb-3 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry.It has survived not only five centuries. </span>
                <div class="comment-footer d-md-flex align-items-center">
                     <span class="badge bg-primary rounded">Pending</span>

                    <div class="text-muted fs-2 ms-auto mt-2 mt-md-0">April 14, 2021</div>
                </div>
            </div>
        </div>
        <!-- Comment Row -->
        <div class="d-flex flex-row comment-row p-3">
            <div class="p-2"><img src="{{ asset('images/users/genu.jpg') }}" alt="user" width="50" class="rounded-circle"></div>
            <div class="comment-text ps-2 ps-md-3 active w-100">
                <h5 class="font-medium">Michael Jorden</h5>
                <span class="mb-3 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry.It has survived not only five centuries. </span>
                <div class="comment-footer d-md-flex align-items-center">

                    <span class="badge bg-success rounded">Approved</span>

                    <div class="text-muted fs-2 ms-auto mt-2 mt-md-0">April 14, 2021</div>
                </div>
            </div>
        </div>
        <!-- Comment Row -->
        <div class="d-flex flex-row comment-row p-3">
            <div class="p-2"><img src="{{ asset('images/users/ritesh.jpg') }}" alt="user" width="50" class="rounded-circle"></div>
            <div class="comment-text ps-2 ps-md-3 w-100">
                <h5 class="font-medium">Johnathan Doeting</h5>
                <span class="mb-3 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry.It has survived not only five centuries. </span>
                <div class="comment-footer d-md-flex align-items-center">

                    <span class="badge rounded bg-danger">Rejected</span>

                    <div class="text-muted fs-2 ms-auto mt-2 mt-md-0">April 14, 2021</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
