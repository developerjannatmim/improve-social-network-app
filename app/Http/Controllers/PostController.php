<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
  public function getDashboard()
  {
    $posts = Post::orderBy('created_at', 'desc')->get();
    return view('dashboard', ['posts' => $posts]);
  }
  public function createNewPost(Request $request)
  {

    $this->validate($request, [
      'body' => 'required|max:1000'
    ]);

    $post = new Post();
    $post->body = $request['body'];
    //$post->user_id = auth()->id();
    $request->user()->posts()->save($post);
    $message = "there was an error";

    if ($post->save()) {
      $message = "Your Post added successfully";
    };
    return redirect()->route('dashboard')->with(['message' => $message]);
  }

  public function getDeletePost($post_id)
  {
    $post = Post::where('id', $post_id)->first();
    $message = "Post isn't deleted";

    if ($post->delete()) {
      $message = "Post deleted successfully";
    };
    return redirect()->route('dashboard')->with(['message' => $message]);
  }
}
