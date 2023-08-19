@extends('layouts.master')

@section('title')
Welcome!
@endsection

@section('content')
@include('includes.message-block')
<div class="row justify-content-center">
  <div class="col-md-6">
    <h3>Sign In</h3>
    <form action=" {{ route('contact') }} " method="POST">
        @csrf
      <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
        <label for="email" class="mb-2">Email</label>
        <input class="form-control" type="text" name="email" id="email" value="{{Request::old('email')}}" />
      </div>
      <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
        <label for="password" class="mb-2">Phone Number</label>
        <input class="form-control" type="password" name="password" id="password" value="{{Request::old('password')}}" />
      </div>
      <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
        <label for="password" class="mb-2">Phone Number</label>
        <input class="form-control" type="password" name="password" id="password" value="{{Request::old('password')}}" />
      </div>
      <span>You don't have any account ? <a href="{{ route('register') }}">register</a></span> | <a href="{{ route('logout') }}">logout</a></br>
      <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
  </div>
</div>
@endsection