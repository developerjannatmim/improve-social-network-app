@extends('layouts.master')

@section('content')
@include('includes.message-block')
<section class="row new-post">
  <div class="col-md-6 col-md-offset-3">
    <header>
      <h1>What do you have to say?</h1>
    </header>
    <form action="{{ route('createpost') }}" method="POST">
      <div class="form-group">
        <textarea class="form-control" name="body" id="new-post" rows="5" placeholder="write something here..."></textarea>
      </div>
      <button type="submit" class="btn btn-primary mt-2">Create Post</button>
      <input type="hidden" name="_token" value="{{ Session::token() }}" />
    </form>
  </div>
</section>
<section class="row posts">
  <div class="col-md-6 col-md-offset-3">
    <header>
      <h1>What other people say...</h1>
    </header>
    @foreach($posts as $post)
    <article class="post">
      <p>{{ $post->body }}</p>
      <div class="info">
        Posted by {{ $post->user->first_name }} on {{ $post->created_at }}
      </div>
      <div class="interaction">
        <a href="#">Like</a> |
        <a href="#">Dislike</a> |
        <a href="#">Edit</a> |
        <a href="{{ route('post.delete', ['post_id' => $post->id]) }}">Delete</a> |
      </div>
    </article>
    @endforeach
  </div>
</section>
@endsection