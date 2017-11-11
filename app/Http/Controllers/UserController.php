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
        return json_encode(true);
    }





}
