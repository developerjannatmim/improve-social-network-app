<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function registration()
    {
        return view('auth.registration');
    }

    public function getRegister(Request $request)
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

    public function getLogin(Request $request)
    {
      $this->validate($request, [
        'email' => 'required',
        'password' => 'required'
      ]);
      if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
        return redirect()->route('dashboard');
      };
      return redirect()->back();
    }

    public function getLogOut()
    {
      Session::flush();
      Auth::logout();
      return redirect()->route('login');
    }
}
