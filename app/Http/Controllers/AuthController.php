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
      $validated = $request->validate([
        'first_name' => 'required|unique:users',
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
  
      return redirect()->route('dashboard')->with(['success' => 'Your register is successful']);
    }

    public function getLogin(Request $request)
    {
      $validated = $request->validate([
        'email' => 'required',
        'password' => 'required'
      ]);
      if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
        return redirect()->route('dashboard')->with(['success' => 'Login successful']);
      }
      return redirect()->back();
    }

    public function getLogOut()
    {
      Session::flush();
      Auth::logout();
      return redirect()->route('login')->with(['success' => 'Logout successful']);
    }
}
