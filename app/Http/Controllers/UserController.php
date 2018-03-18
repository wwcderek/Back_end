<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
class UserController extends Controller
{
    //


    public function __construct()
    {
    }


    public function uploadIcon(Request $request)
    {
        $username = $request->username;
        $path = $request->path;
        $iconname = $request->iconname;
        if(is_null($username))
            return json_encode(false);
        User::where('username', $username)
        ->update(['icon_path' => $path]);

        $user = User::where('username', $username)->first();
        $data[] = array(
            'user_id' => $user->user_id,
            'username' => $user->username,
            'displayname' =>$user->displayname,
            'email' => $user->email,
            'iconPath' => $user->icon_path,
            'role' => $user->role
        );
        return json_encode($data);
    }


    public function updateProfile(Request $request)
    {
        $username = $request->username;
        $displayname = $request->displayname;
        $email = $request->email;
        if(is_null($username))
            return json_encode(false);
        User::where('username', $username)
            ->update(['displayname' => $displayname, 'email' => $email]);
        $user = User::where('username', $username)->first();
        $data[] = array(
            'user_id' => $user->user_id,
            'username' => $user->username,
            'displayname' =>$user->displayname,
            'email' => $user->email,
            'iconPath' => $user->icon_path,
            'role' => $user->role
        );
        return json_encode($data);
    }

    public function userList(Request $request, $username = null)
    {
        if (!$request->session()->has('user'))
            return redirect('/');

       if($username!=null) {
           $users = User::where('username', $username)->get();
           return view('userList')->with(['users' => $users]);
       }
        $users = User::all();
        return view('userList')->with(['users' => $users]);
    }

    public function updateUser()
    {
        User::where('user_id', request('user_id'))
            ->update([
                'username' => request('username'),
                'displayname' => request('displayname'),
                'email' => request('email'),
                'role' => request('role')
            ]);
        return redirect()->route('userList');

    }
}
