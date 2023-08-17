<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    if (Auth::user() != $post->user) {
      return redirect()->back();
    }
    $post->delete();
    return redirect()->route('dashboard')->with(['message' => "Successfully deleted"]);
  }

  public function editPost(Request $request)
  {
    $this->validate($request, [
      'body' => 'required'
    ]);
    $post = Post::find($request['postId']);
    $post->body = $request['body'];
    $post->update();
    return response()->json(['new-body' => $post->body], 200);
  }
}
