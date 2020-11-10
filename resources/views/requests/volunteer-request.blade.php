@extends('layouts.master')
@section('content')
<div class="container-fluid">
  <div class="side-body padding-top">
     <div id="voyager-notifications"></div>
      <div class="page-content">
       <div class="alerts">
       </div>
       <h1><i class="voyager-smile"></i> Volunteer-request</h1>

<div class="clearfix container-fluid row">
      @forelse($volunteersRequests as $volunteer)

      <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="panel widget center bgimage" style="margin-bottom:0;overflow:hidden;background-image:url('http://127.0.0.1:8000/img/02.jpg');">
        <div class="dimmer"></div>
          <div class="panel-content">
          <i class="voyager-smile"></i>
          <h4>{{"Name: "  . $volunteer->full_name}}</h4>
            <h3>{{"Work Place: " . $volunteer->work_place}}</h3>
            <button type="button" name="view"  class="btn  btn-warnning"><a class="" href="{{route('voyager.volunteerRequestView',$volunteer)}}">view</a></button>
        </div>
      </div>
</div>
@empty
<div class="col-xs-12 col-sm-6 col-md-4">
  <div class="panel widget center bgimage" style="margin-bottom:0;overflow:hidden;background-image:url('http://127.0.0.1:8000/img/02.jpg');">
  <div class="dimmer"></div>
    <div class="panel-content">
    <i class="voyager-smile"></i>
    <h4>{{"nothing"}}</h4>
      <h3>{{"here"}}</h3>
      <button type="button" name="view"  class="btn  btn-warnning">view</button>
  </div>
</div>
</div>
@endforelse


      </div>

    </div>
  </div>
</div>
@stop
