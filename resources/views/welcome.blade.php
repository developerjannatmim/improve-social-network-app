@extends('layouts.master')

@section('title')
Welcome!
@endsection

@section('content')
<div class="row">
  <div class="col-md-6">
    <h3>Sign Up</h3>
    <form action="{{ route('signup') }}" method="POST">
    @csrf
      <div class="form-group">
        <label for="first_name" class="mb-2">First Name</label>
        <input class="form-control" type="text" name="fname" id="fname" />
      </div>
      <div class="form-group">
        <label for="email" class="mb-2">Email</label>
        <input class="form-control" type="text" name="email" id="email" />
      </div>
      <div class="form-group">
        <label for="password" class="mb-2">Password</label>
        <input class="form-control" type="password" name="password" id="password" />
        <button type="submit" class="btn btn-primary mt-2">Submit</button>
      </div>
    </form>
  </div>
  <div class="col-md-6">
    <h3>Sign In</h3>
    <form action="#" method="POST">
      <div class="form-group">
        <label for="email" class="mb-2">Email</label>
        <input class="form-control" type="text" name="email" id="email" />
      </div>
      <div class="form-group">
        <label for="password" class="mb-2">Password</label>
        <input class="form-control" type="password" name="password" id="password" />
      </div>
      <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
  </div>
</div>
@endsection
