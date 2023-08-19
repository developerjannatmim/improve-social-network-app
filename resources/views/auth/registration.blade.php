@extends('layouts.master')

@section('title')
Register
@endsection

@section('content')
<div class="row justify-content-center">
  <div class="col-md-6 mt-5">
    <h3>Register Form</h3>
    <form action="{{ route('register.post') }}" method="POST">
      @csrf
      <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
        <label for="first_name" class="mb-2">First Name</label>
        <input class="form-control" type="text" name="first_name" id="first_name" value="{{Request::old('first_name')}}" />
        @if($errors->has('first_name'))
        <span class="text-danger">{{ $errors->first('first_name') }}</span>
        @endif
      </div>
      <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
        <label for="email" class="mb-2">Email</label>
        <input class="form-control" type="text" name="email" id="email" value="{{Request::old('email')}}" />
        @if($errors->has('email'))
        <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif
      </div>
      <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
        <label for="password" class="mb-2">Password</label>
        <input class="form-control" type="password" name="password" id="password" value="{{Request::old('password')}}" />
        @if($errors->has('password'))
        <span class="text-danger">{{ $errors->first('password') }}</span>
        @endif
      </div>
      <span>Already have an account ? <a href="{{ route('login') }}">Login</a></span></br>
      <button type="submit" class="btn btn-primary mt-2">Register</button>
    </form>
  </div>
</div>
@endsection