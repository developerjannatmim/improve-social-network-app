<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class AccountController extends Controller
{
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

}
