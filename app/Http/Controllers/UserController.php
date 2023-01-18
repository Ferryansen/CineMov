<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user.home');
    }

    public function manageUser() 
    {
        $users = User::where('role', 'user')->orderBy('name')->get();

        return view('admin.manage-user', compact('users'));
    }

    public function searchUser(Request $req)
    {
        $input = $req->q;
        if ($input == "ban" || $input == "banned") {
            $users = User::where([
                    ['role', 'user'],
                    ['isBanned', 1]
                ])->get();
        } else {
            $users = User::where([
                    ['name', 'like', '%'.$req->q.'%'],
                    ['role', 'user']
                ])->get();
        }

        return view('admin.manage-user', compact('users'));
    }

    public function updateUserBan(Request $req, $user_id)
    {
        $user = User::findOrFail($user_id);
        if ($req->isBan == 0) {
            $user->isBanned = 0;
        } else {
            $user->isBanned = 1;
        }

        $user->save();
        return redirect()->back();
    }

    
}
