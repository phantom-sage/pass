  @extends('layouts.master')
  @section('content')
  <div class="container-fluid">
    <div class="side-body padding-top">
       <div id="voyager-notifications"></div>
        <div class="page-content">
         <div class="alerts">
         </div>
  <div class="clearfix container-fluid row">
        @forelse($files as $file)
        <div class="col-xs-12 col-sm-6 col-md-4">
          <div class="panel widget center bgimage" style="margin-bottom:0;overflow:hidden;background-image:url('http://127.0.0.1:8000/img/02.jpg');">
          <div class="dimmer"></div>
            <div class="panel-content">
            <i class="voyager-folder"></i>
            <h4>{{$file->name_en}}</h4>
              <p>Downloaded:{{$file->downloads()->count()}}</p>

          </div>
        </div>
  </div>
  @empty
  <div class="col-xs-12 col-sm-6 col-md-4">
    <div class="panel widget center bgimage" style="margin-bottom:0;overflow:hidden;background-image:url('http://127.0.0.1:8000/img/02.jpg');">
    <div class="dimmer"></div>
      <div class="panel-content">
      <i class="voyager-text-files"></i>
      <h4>{{nothing}}</h4>

    </div>
  </div>
</div>
  @endforelse


        </div>

      </div>
    </div>
  </div>
  @stop
