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
        $user = User::where('username','=', $username)->first();
        if(!is_null($user)) {
            $user->icon_path = $path;
            return json_encode(true);
        }
        return json_encode(false);
    }





}
