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
          <!-- Text input-->
          <div class="form-group">
            <h4>{{ trans('messages.Title') }}</h4>
            <div class="col-md-4 inputGroupContainer">
              <div class="input-group">
                  {{ $report->title }}
              </div>
            </div>
          </div>
          <div class="form-group">
            <h4 class="col-md-4 control-label">{{ trans('messages.FullName') }}</h4>
            <div class="col-md-4 inputGroupContainer">
              <div class="input-group">
                  {{ $report->owner->name }}
              </div>
            </div>
          </div>
          <div class="form-group">
            <h4 class="col-md-4 control-label">{{ trans('messages.DoingToday') }}</h4>
            <div class=" inputGroupContainer">
              <div class="input-group">
                  {{ $report->description }}
              </div>
            </div>
          </div>
          <div class="form-group">
            <h4 class="col-md-4 control-label">{{ trans('messages.Problem') }}</h4>
            <div class="inputGroupContainer">
              <div class="input-group">
                {{ $report->problem }}
              </div>
            </div>
          </div>

      </div>
    </div>
  </div>
</div>
@endsection
