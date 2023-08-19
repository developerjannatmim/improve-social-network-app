@extends('layouts.master')

@section('content')
@include('includes.message-block')
<section class="row new-post">
  <div class="col-md-6 col-md-offset-3">
    <header>
      <h1>What do you have to say?</h1>
    </header>
    <form action="{{ route('createpost') }}" method="POST">
      @csrf
      <div class="form-group">
        <textarea class="form-control" name="body" id="new-post" rows="5" placeholder="write something here..."></textarea>
      </div>
      <button type="submit" class="btn btn-primary mt-2">Create Post</button>
    </form>
  </div>
</section>
@endsection