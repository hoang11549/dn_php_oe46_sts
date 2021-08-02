
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
      <h1>{{ $date }}</h1>
        <div class="col-md-12">
            <div class="white-box">
                <form class="well form-horizontal"
                 action="{{ route('reportDaily.store')}}" method="post"  
                id="contact_form">
                    @csrf
                    <!-- Text input-->

                    <div class="form-group">
                      <label class="col-md-4 control-label">{{ trans('messages.Title') }}</label>  
                        <div class="col-md-4 inputGroupContainer">
                         <div class="input-group">
                            <input  name="title" placeholder="{{ trans('messages.Title') }}" class="form-control"  type="text">
                        </div>
                      </div>
                    </div>
                    @if(Auth::user()->status==config('training.check.active'))
                    <div class="form-group">
                      <label class="col-md-4 control-label">{{ trans('messages.Course') }}</label>
                      <select class="form-control" id="exampleFormControlSelect1" name="Course">
                            <option value="{{ $value->id }}">
                                {{ $value->name }}
                            </option>
                    </select>
                    </div>
                    @endif
                    <div class="form-group"> 
                        <label class="col-md-4 control-label">{{ trans('messages.Datetime') }}:</label>                    
                            <input type="date"class="form-control" id="datetime" name="datetime">
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">{{ trans('messages.DoingToday') }}</label>  
                          <div class=" inputGroupContainer">
                           <div class="input-group">  
                            <textarea class="form-control" name="doingDate" rows="4" cols="250" 
                            placeholder="Your {{ trans('messages.DoingToday') }}"></textarea>
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
@endsection
