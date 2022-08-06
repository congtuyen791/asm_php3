<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('auth.login');
    }

    public function getRegister()
    {
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = 0;
        $user->status = 1;
        // dd($user);
        $user->save();
        return redirect()->route('auth.getLogin');
    }
    public function postLogin(Request $request) {
        $data = $request->all();
        $email = $data['email'];
        $password = $data['password'];
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect()->route('admin.home');
        }
        return redirect()->route('auth.getLogin');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.getLogin');
    }
}
