@extends('layouts.master')
@section('content')
<div class="container-fluid">
  <div class="side-body padding-top">
     <div id="voyager-notifications"></div>
      <div class="page-content">
       <div class="alerts">
       </div>
       <h1><i class="voyager-smile"></i> Partner-request</h1>

        <div class="clearfix container-fluid row">

              <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="dimmer"></div>
                  <div class="panel-content">
                  <i class="voyager-smile"></i>
                  <p> <strong>Partner Name :</strong>{{ $partnerRequest->full_name}}</p>
                  <p> <strong>Organization :</strong>{{ $partnerRequest->organization}}</p>
                  <p> <strong>O-business area :</strong>{{ $partnerRequest->organization_area}}</p>
                  <p> <strong>E-Mail Address :</strong>{{ $partnerRequest->email}}</p>
                  <p> <strong>Proposal :</strong>{!! $partnerRequest->proposal!!}</p>
                    <button type="button" name="reply"  class="btn  btn-success"><a href="{{route('voyager.replaycreate',$partnerRequest)}}">Reply</a></button>
                </div>
              </div>

      </div>

    </div>
  </div>
</div>
@stop
