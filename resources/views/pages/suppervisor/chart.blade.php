@extends('index')
@section( 'content')
<div class="col-xl-5 col-lg-6">
<div class="card shadow mb-4">
<div class="card-header-tab card-header"><h4>Chart Course In Year</h4>
    <select id="listYear">
        @foreach($yearArray as $key=>$year)
            <option value="{{$year }}" {{ $yearNow==$year? 'selected':'' }}>{{ $year }}</option>
        @endforeach
    </select>
</div>
<canvas id="myChartCourse"></canvas>
</div>
</div>
@endsection
