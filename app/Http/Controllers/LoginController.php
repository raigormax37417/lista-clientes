<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
  use AuthenticatesUsers;
 
  public function index() 
  {
    return view('auth/login');
  }
  
  public function redirectToFacebookProvider() 
  {
    return Socialite::driver('facebook')->redirect();
  }

  public function handleProviderFacebookCallback() 
  {
    $auth_user = Socialite::driver('facebook')->user();
    //dd($auth_user);  
    return redirect('casilla');
  }
  public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        
        $request->session()->regenerateToken();
        
        return redirect("/");
    }
}
