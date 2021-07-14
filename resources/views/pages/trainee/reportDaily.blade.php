
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
                <form class="well form-horizontal" action=" " method="post"  id="contact_form">
                    @csrf

                    <!-- Text input-->
                    
                    <div class="form-group">
                      <label class="col-md-4 control-label">{{ trans('messages.Title') }}</label>  
                        <div class="col-md-4 inputGroupContainer">
                         <div class="input-group">
                            <input  name="Title" placeholder="{{ trans('messages.Title') }}" class="form-control"  type="text">
                        </div>
                      </div>
                    </div>
                    <div class="form-group"> 
                        <label class="col-md-4 control-label">{{ trans('messages.Datetime') }}:</label>                    
                            <input type="date"class="form-control" id="datetime" name="datetime">
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">{{ trans('messages.DoingToday') }}</label>  
                          <div class=" inputGroupContainer">
                           <div class="input-group">  
                            <textarea name="doingDate"></textarea>
                          </div>
                        </div>
                      </div>
                     
                      <div class="form-group">
                        <label class="col-md-4 control-label">{{ trans('messages.Problem') }}</label>
                          <div class="inputGroupContainer">
                             <div class="input-group">
                                  <textarea class="form-control" name="problem" rows="4" cols="250" placeholder="Your {{ trans('messages.Problem') }}"></textarea>
                             </div>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary">{{ trans('messages.Submit') }}</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div> 
</div> 
<script src="{{ asset('assets/js/cket.js') }}">
</script>
@endsection
