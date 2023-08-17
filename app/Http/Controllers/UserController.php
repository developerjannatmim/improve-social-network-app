<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
  public function getSignUp(Request $request)
  {
    $this->validate($request, [
      'first_name' => 'required',
      'email' => 'required|email|max:120|unique:users',
      'password' => 'required|min:4'
    ]);

    $first_name = $request['first_name'];
    $email = $request['email'];
    $password = $request['password'];

    $user = new User();
    $user->first_name = $first_name;
    $user->email = $email;
    $user->password = $password;

    $user->save();
    Auth::login($user);

    return redirect()->route('dashboard');
  }

  public function getSignIn(Request $request)
  {
    $this->validate($request, [
      'email' => 'required',
      'password' => 'required'
    ]);
    if  (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])){
      return redirect()->route('dashboard');
    };
      return redirect()->back();
  }
  
  public function getLogOut()
  {
    Auth::logout();
    return redirect()->route('home');
  }

  public function getAccount()
  {
    return view('account', ['user' => Auth::user()]);
  }

  public function updateAccount()
  {
    return view('account');
  }
}
