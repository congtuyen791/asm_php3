<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UserRequest;
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

    public function postRegister(RegisterRequest $request)
    {
        $request->validate([
            'name' => 'required|min:6|max:32',
            'email' => 'required|min:6|max:32|email',
            'password' => 'required|min:6',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = 0;
        $user->status = 1;
        // dd($user);
        $user->save();
        session()->flash('success', 'Bạn đã đăng ký người dùng thành công');
        return redirect()->route('auth.getLogin');
    }
    public function postLogin(UserRequest $request) {
        $request->validate([
            'email' => 'required|min:6|max:32|email',
            'password' => 'required|min:6|max:32',
        ]);
        $data = $request->all();
        $email = $data['email'];
        $password = $data['password'];
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            if(Auth::user()->role === 1 && Auth::user()->status === 1){
                return redirect()->route('admin.home');
            }else{
                return redirect()->route('home');
            }
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
