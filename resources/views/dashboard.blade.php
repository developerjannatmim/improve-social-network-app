@extends('layouts.master')

@section('content')
<section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header><h1>What do you have to say?</h1></header>
            <form action="{{ route('createpost') }}" method="POST">
                <div class="form-group">
                    <textarea class="form-control" name="body" id="new-post" rows="5" placeholder="write something here..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Create Post</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}"/>
            </form>
        </div>
</section>
<section class="row posts">
  <div class="col-md-6 col-md-offset-3">
    <header><h1>What other people say...</h1></header>
    <article class="post">
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, odit. Facere itaque hic vel impedit asperiores illum temporibus qui maxime, deserunt, corrupti culpa eos, ad sit similique omnis dolorem repellendus tempore! Nostrum ut nemo officiis itaque debitis possimus exercitationem explicabo architecto sunt! Expedita reprehenderit amet quis dolores, rerum cupiditate dolor?</p>
      <div class="info">
      Posted by Max on 16 December
      </div>
      <div class="interaction">
      <a href="#">Like</a> |
      <a href="#">Dislike</a> |
      <a href="#">Edit</a> |
      <a href="#">Delete</a> |
      </div>
    </article>
    <article class="post">
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, odit. Facere itaque hic vel impedit asperiores illum temporibus qui maxime, deserunt, corrupti culpa eos, ad sit similique omnis dolorem repellendus tempore! Nostrum ut nemo officiis itaque debitis possimus exercitationem explicabo architecto sunt! Expedita reprehenderit amet quis dolores, rerum cupiditate dolor?</p>
      <div class="info">
      Posted by Max on 17 December
      </div>
      <div class="interaction">
      <a href="#">Like</a> |
      <a href="#">Dislike</a> |
      <a href="#">Edit</a> |
      <a href="#">Delete</a> |
      </div>
    </article>
  </div>
</section>
@endsection