@extends('layouts.master')
@section('content')
<h1><i class="voyager-chat"></i> Messages</h1>

<form class="form" action="{{route('voyager.sendUsersEmail')}}" method="post">
  @csrf
  <div class="form-group ">
    <label for="Message">Message</label>
    <textarea name="message" rows="8"  class="form-control
    @error('last_name') is-invalid @enderror "
    cols="60" placeholder="Enter Yout Message">
    {{old('message')}}</textarea>
          @error('message')
              <span class="alert alert-danger" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
  </div><br>

  <button type="submit" name="send" class="btn btn-sm btn-success">send</button>
</form>


@stop
