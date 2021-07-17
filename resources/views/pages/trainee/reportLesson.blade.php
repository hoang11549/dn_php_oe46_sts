@extends('index')
@section( 'content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title">{{ trans('messages.Daily') }}</h3>
            </div>
        </div>
    </div> 
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <form class="well form-horizontal" 
                action="{{ route('reportLesson.store',['lessonId' => $lessonId,'date'=>$date,'idSubject'=>$idSubject]) }}" 
                method="post" enctype="multipart/form-data"  id="contact_form">
                    @csrf
                    <div class="form-group">
                      <label class="col-md-4 control-label">{{ trans('messages.Title') }}</label>  
                        <div class="col-md-4 inputGroupContainer">
                         <div class="input-group">
                            <input  name="Title" placeholder="{{ trans('messages.Title') }}" class="form-control"  type="text">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">{{ trans('messages.reportLesson') }}</label>  
                          <div class=" inputGroupContainer">
                           <div class="input-group">  
                            <textarea name="Report"></textarea>
                          </div>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary">{{ trans('messages.Submit') }}</button>
                </form>
            </div>
        </div>
    </div> 
</div> 
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('bower_components/boostrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/cket.js') }}"></script>
<script type="text/javascript">
    CKEDITOR.replace('Report', {
        filebrowserUploadUrl: '{{ route('reportLesson.upload', ['_token' => csrf_token()]) }}',
        filebrowserUploadMethod: 'form'
    });
</script>
@endsection
