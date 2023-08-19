<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
  public function getBlog()
  {
    $posts = Post::orderBy('created_at', 'desc')->get();
    return view('blog', ['posts' => $posts]);
  }

  public function create()
  {
    return view('create-blog');
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
    return redirect()->route('blog')->with(['message' => $message]);
  }

  public function getDeletePost($post_id)
  {
    $post = Post::where('id', $post_id)->first();
    if (Auth::user() != $post->user) {
      return redirect()->back();
    }
    $post->delete();
    return redirect()->route('blog')->with(['success', 'Post Deleted successfully.']);
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

  public function postLikePost(Request $request)
  {
    $post_id = $request['postId'];
    $is_like = $request['isLike'] === 'true';
    $update = false;
    $post = Post::find($post_id);
    if (!$post) {
      return null;
    }
    $user = Auth::user();
    $like = $user->likes()->where('post_id', $post_id)->first();
    if ($like) {
      $already_like = $like->like;
      $update = true;
      if ($already_like == $is_like) {
        $like->delete();
        return null;
      }
    } else {
      $like = new Like();
    }
    $like->like = $is_like;
    $like->user_id = $user->id;
    $like->post_id = $post->id;
    if ($update) {
      $like->update();
    } else {
      $like->save();
    }
    return null;
  }
}
