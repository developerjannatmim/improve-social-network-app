<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function getAccount()
    {
      return view('account', ['user' => Auth::user()]);
    }
  
    public function postSaveAccount(Request $request)
    {
      $validated = $request->validate([
        'first_name' => 'required',
        'image' => 'required|mimes:jpeg,jpg,png,gif,svg'
      ]);

      $user = Auth::user();
      $user->first_name = $request['first_name'];
      $image_name = time().".".$request->image->extension();
      $request->image->move(public_path('users'), $image_name);
      $path = "/users/".$image_name;
      $user->name = $request->name;
      $user->image = $image_name;
      $user->save();
      return redirect()->route('account');
    }

}
