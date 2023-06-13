@extends('layouts.app')

@section('title','Register')
    
    @section('content')
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card">
  <div class="card-header text-center">
    Login
  </div>
  <div class="card-body">
<form method="post" action="{{url("register")}}">
    @csrf
    @if (session()->has('arrow_message'))
        <div class="alert alert-danger">
            {{ session()->get('arrow_message')}}
        </div>
        
    @endif

  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name"  name="name" value="{{old('name')}}">
  @if ($errors->has('name'))
      <small class="text-danger">{{$errors->first('name')}}</small>
  @endif
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{old('email')}}">
  @if ($errors->has('email'))
      <small class="text-danger">{{$errors->first('email')}}</small>
  @endif
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
  @if ($errors->has('password'))
      <small class="text-danger">{{$errors->first('password')}}</small>
  @endif
  </div>

  <div class="mb-3">
    <label for="password_confirmation" class="form-label">password Confirmation</label>
    <input type="password" class="form-control" id="password_confirmation" aria-describedby="emailHelp" name="password_confirmation">
  </div>

  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>

  <div class="text-center">
    <button type="submit" class="btn btn-primary">Register</button>
  </div>
</form>
  </div>
</div>
        </div>
    </div>



@endsection