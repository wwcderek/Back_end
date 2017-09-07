<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;
class UserController extends Controller
{
    //
    public function __construct()
    {
    }


    public function registration(Request $request)
    {
        if(User::where('name', $request->name)->count()!==0)
            return json_encode(1);

        DB::transaction(function () use ($request) {
        $user = User::create(array(
            'name' => $request->name,
            'password' => Hash::make($request->password)
        ));
        $user->save();
        });
        return json_encode(0);
    }

    public function login(Request $request)
    {
         $attempt = Auth::attempt([
            'name' => $request->name,
            'password' => $request->password
        ]);
         if($attempt)
                 return json_encode(true);
         return json_encode(false);
    }

    public function logout()
    {
        Auth::logout();
    }



}
