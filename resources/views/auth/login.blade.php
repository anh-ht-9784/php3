@extends('layout')

@section('content')
<div>
  @if( session()->has('error') === true )
  <div class="alert alert-danger">
      {{ session()->get('error') }}
  </div>
@endif
    <form method="post" action="{{ route('auth.login') }}">
        @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
@endsection 