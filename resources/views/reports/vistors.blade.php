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
            </div>
          </div>
    </div>


    <form class="from" action="" method="get">
      @csrf
      <div class="form-group">
        <label for="filter-By-date">Filtter</label>
        <input type="date" name="date" value="today" >
        <button type="submit" name="button" class="btn btn-sm btn-info">check</button>
      </div>

    </form>
    <div class="row">
      <label for="result">Result</label>
      @if($filter>0)
      <strong>Today's Vistorse : <small class="text-muted">{{$filter}}</small></strong>
      @else
      <small class="text-muted">{{"Sorry we couldn't find any result!"}}</small>
      @endif
    </div>
  </div>

    </div>
  </div>
</div>
@stop
