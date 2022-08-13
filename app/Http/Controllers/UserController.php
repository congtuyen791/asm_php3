<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::select('*')->orderBy('id', 'desc')->paginate(10);
        return view('admin.user.list',['user_list' => $users]);
    }
    public function updateRole(User $user) {
        if ($user->role == 0) {
            $user->update(['role' => 1]);
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
    public function status(User $user)
    {
        if ($user->status == 1) {
            $user->update(['status' => 0]);
            return redirect()->back();
        } else {
            $user->update(['status' => 1]);
            return redirect()->back();
        }
    }
}
