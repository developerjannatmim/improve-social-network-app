@extends('layouts.master')

@section('content')
<section class="row new-post">
  <div class="col-md-6 col-md-offset-3">
    <header>
      <h1>What do you have to say?</h1>
    </header>
    <form action="{{ route('create.post') }}" method="POST">
      @csrf
      <div class="form-group">
        <textarea class="form-control" name="body" id="new-post" rows="5" placeholder="write something here..."></textarea>
        @if($errors->has('body'))
        <span class="text-danger">{{ $errors->first('body') }}</span>
        @endif
      </div>
      <button type="submit" class="btn btn-primary mt-2">Create Post</button>
    </form>
  </div>
</section>
@endsection