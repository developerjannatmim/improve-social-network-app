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
    <article class="post" data-postid="{{ $post->id }}">
      <p>{{ $post->body }}</p>
      <div class="info">
        Posted by {{ $post->user->first_name }} on {{ $post->created_at }}
      </div>
      <div class="interaction">
        <a class="like" href="#">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 1 ? 'You like this post' : 'Like' : 'Like'  }}</a> |
        <a class="like" href="#">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 0 ? 'You don\'t like this post' : 'Dislike' : 'Dislike'  }}</a>
        @if( Auth::user() == $post->user )
        |
        <a href="#" class="edit">Edit</a> |
        <a href="{{ route('post.delete', ['post_id' => $post->id]) }}">Delete</a>
        @endif
      </div>
    </article>
    @endforeach
  </div>
</section>

<div class="modal fade" tabindex="-1" id="edit-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Post</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="post-body">Edit the post</label>
            <textarea class="form-control" name="post-body" id="post-body" rows="5"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="modal-save">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script>
  var token = '{{ Session::token() }}';
  var urlEdit = "{{ route('edit') }}";
  var urlLike = "{{ route('like') }}";
</script>
@endsection