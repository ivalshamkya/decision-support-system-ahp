<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('/',[
            'title' => 'Login'
        ]);
    }

    public function signin(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
    
        $user = User::where('username', $credentials['username'])->first();
    
        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return back()->with('loginError', 'Login Failed!');
        }
    
        Auth::login($user);
        $user->unhashed_password = $credentials['password'];
        $request->session()->regenerate();
        $request->session()->put('user', $user);
        

        if($user->role == 'superadmin' || $user->role == 'admin')
            return redirect()->intended('/dashboard');
        else
            return redirect()->intended('/guest/dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
