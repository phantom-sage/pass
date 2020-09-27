@extends('layouts.master')
@section('content')
<div class="container-fluid">
  <div class="side-body padding-top">
     <div id="voyager-notifications"></div>
      <div class="page-content">
       <div class="alerts">
       </div>
    <div class="clearfix container-fluid row">

          <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="panel widget center bgimage" style="margin-bottom:0;overflow:hidden;background-image:url('http://127.0.0.1:8000/img/03.jpg');">
            <div class="dimmer"></div>
              <div class="panel-content">
              <i class="voyager-people"></i>
              <h4>{{"Vistors"}}</h4>
                <hr>
                <p>Today:{{$today}}</p>
                <hr>
                <p>Total Vistors:{{$total}}</p>
                <p>history:{{"check for more"}}</p>
            </div>
          </div>
    </div>



      </div>

    </div>
  </div>
</div>
@stop
