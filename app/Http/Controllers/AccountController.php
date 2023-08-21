<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class AccountController extends Controller
{
<<<<<<< HEAD
  public function getAccount(Request $request)
  {
    return view('account', [
      'user' => $request->user(),
    ]);

  }

  public function postSaveAccount(Request $request)
  {
    $validated = $request->validate([
      'first_name' => 'nullable|string',
      'profile' => 'nullable|image',
    ]);

    $user = $request->user();

    if ($validated['first_name']) {
      $user->first_name = $validated['first_name'];
      $user->update();
      return redirect()->back();
    }

    if ($validated['profile']) {
      Image::updateOrCreate(
        ['user_id' => $user->id],
        ['name' => $validated['profile']->store('images', 'public')],
      );
    }

    return redirect()->route('account');
  }

=======
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

>>>>>>> c95edf0b83413ab78956ddf1806c29b2a030905b
}
