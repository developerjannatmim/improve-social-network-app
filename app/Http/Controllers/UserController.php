<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
// use Spatie\Backtrace\File;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */






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
