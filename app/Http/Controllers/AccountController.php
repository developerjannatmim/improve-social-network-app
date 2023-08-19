<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function getAccount()
    {
      return view('account', ['user' => Auth::user()]);
    }
  
    public function postSaveAccount(Request $request)
    {
      $this->validate($request, [
        'first_name' => 'required',
      ]);
      $user = Auth::user();
      $user->first_name = $request['first_name'];
      $user->update();
      $file = $request->file('image');
      $filename = $request['first_name'] . '-' . $user->id . 'jpg';
      if ($file) {
        Storage::disk('local')->put($filename, File::get($file));
      }
      return redirect()->route('account');
    }
  
    public function getUserImage($filename)
  
    {
      $file = Storage::disk('local')->get($filename);
      return new Response($file, 200);
    }
}
