<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function createNewPost(Request $request) {

        $this->validate($request, [
          'body' => 'required|max:1000'
        ]);
        
        $post = new Post();
        $post->body = $request['body'];
        $post->user_id = auth()->id();
        $message = "there was an error";
        if($post->save()){
          $message = "Your message has been successfully sent!!!";
        };
        return redirect()->route('dashboard')->with(['message' => $message]);

        //$request->user()->posts()->save($post);
        // return response()->json([
        //   'success' => true,
        //   'status' => '200'
        // ]);
        // if ($post) {
        //     return redirect()->back()->with('success', 'Your message has been successfully sent!!!');
        // }
        // return redirect() ->back() ->withInput() ->with('error', 'There was a failure while sending the message! ');
        
    }
    
}