@extends('layouts.master')

@section('title')
Account
@endsection

@section('content')
<section class="row new-post">
  <div class="col-md-6 col-md-offset-3">
    <header>
      <h3>Your Account</h3>
    </header>
    <form action="{{ route('account.save') }}" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" class="form-control" value="{{ $user?->first_name }}" id="first_name">
      </div>
      <div class="form-group">
<<<<<<< HEAD
        <label for="profile">Image (only.jpg)</label>
        <input type="file" name="profile" class="form-control" id="profile" >
=======
        <label for="image">Image (only.jpg)</label>
        <input type="file" name="image" class="form-control" id="image" >
>>>>>>> c95edf0b83413ab78956ddf1806c29b2a030905b
      </div>
      <button type="submit" class="btn btn-primary">Save Account</button>
      <input type="hidden" name="_token" value="{{ Session::token() }}" />
    </form>
  </div>
</section>
<<<<<<< HEAD

<section class="row new-post">
  <div class="col-md-6 col-md-offset-3">
    <img
      class="img-responsive img-thumbnail"
      src="{{ asset('storage/' . $user?->image?->name) }}"
      alt=""
    />
  </div>
</section>
@endsection
=======
<section class="row new-post">
  <div class="col-md-6 col-md-offset-3">
    <img src="{{ $user->image }}" alt="" class="img-responsive" />
  </div>
</section>
@endsection
>>>>>>> c95edf0b83413ab78956ddf1806c29b2a030905b
