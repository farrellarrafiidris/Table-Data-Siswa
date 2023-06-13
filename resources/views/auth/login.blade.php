@extends('layouts.app')

@section('title','Login')
    
    @section('content')
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card">
  <div class="card-header text-center">
    Login
  </div>
  <div class="card-body">
<form method="post" action="{{url("login")}}">
    @csrf
    @if (session()->has('arrow_message'))
        <div class="alert alert-danger" id="alert">
            {{ session()->get('arrow_message')}}
        </div>
        
    @endif

    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
  </div>

  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>

  <div class="text-center">
    <button type="submit" class="btn btn-dark">login</button>
  </div>
</form>
  </div>
</div>
        </div>
    </div>

@endsection