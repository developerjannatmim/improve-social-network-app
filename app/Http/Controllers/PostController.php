<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function createNewPost(Request $request) {
        $post = new Post();
        $post->body = $request['body'];
        $request->user()->posts()->save($post);
        return redirect()->route('dashboard');
    }
}