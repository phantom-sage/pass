  @extends('layouts.master')
  @section('content')
  <div class="container-fluid">
    <div class="side-body padding-top">
       <div id="voyager-notifications"></div>
        <div class="page-content">
         <div class="alerts">
         </div>
  <div class="clearfix container-fluid row">
        @forelse($projects as $project)
        <div class="col-xs-12 col-sm-6 col-md-4">
          <div class="panel widget center bgimage" style="margin-bottom:0;overflow:hidden;background-image:url('http://127.0.0.1:8000/img/02.jpg');">
          <div class="dimmer"></div>
            <div class="panel-content">
            <i class="voyager-bag"></i>
            <h4>{{$project->name}}</h4>
              <p>Comment:55</p>
              <p>Like:55</p>
              <p>Share:55</p>
          </div>
        </div>
  </div>
  @empty
  @endforelse


        </div>

      </div>
    </div>
  </div>
  @stop
