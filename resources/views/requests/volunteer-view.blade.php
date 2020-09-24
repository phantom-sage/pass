@extends('layouts.master')
@section('content')
<div class="container-fluid">
  <div class="side-body padding-top">
     <div id="voyager-notifications"></div>
      <div class="page-content">
       <div class="alerts">
       </div>
       <h1><i class="voyager-smile"></i> Volunter-request</h1>

        <div class="clearfix container-fluid row">

              <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="dimmer"></div>
                  <div class="panel-content">
                  <i class="voyager-smile"></i>
                  <p> <strong>Volunteer Name</strong>{{ $volunteerRequest->full_name}}</p>
                  <p> <strong>Work Place</strong>{{ $volunteerRequest->work_place}}</p>
                  <p> <strong>age</strong>{{ $volunteerRequest->age}}</p>
                  <p> <strong>E-Mail Address</strong>{{ $volunteerRequest->email}}</p>
                  <p> <strong>Phone Number</strong>{{ $volunteerRequest->phone}}</p>
                  <!-- qualifications must be changed to an ordinary texxt -->
                  <p> <strong>qualifications</strong>{!! $volunteerRequest->qualification!!}</p>
                    <button type="button" name="reply"  class="btn  btn-success"><a href="{{route('voyager.createUserEmail')}}">Reply</a></button>
                </div>
           </div>

      </div>

    </div>
  </div>
</div>
@stop
