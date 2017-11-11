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
        $user = User::where(['username'=>$username])->get();
        if(count($user) > 0 ) {
            $user[0]->icon_path = $path;
            $user[0]->save();
            return json_encode(true);
        }
        return json_encode(false);
    }





}
