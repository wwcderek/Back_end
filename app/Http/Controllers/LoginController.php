<?php

namespace App\Http\Controllers;
use App\Models\Permission;
use App\Models\User;
use App\Http\Requests ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    //
    public function __construct() {
    }

    /**
     * @param Request $request
     * @return string
     */
    public function login(Request $request)
    {
        $username = $request->name;
        $password = $request->password;
        $condition = ['username'=> $username, 'category'=> 'general'];
        $userInfo = User::where($condition)->get();
        if(count($userInfo) > 0 && (Hash::check($password, $userInfo[0]->password))) {
            $data[] = array(
            'username' => $userInfo[0]->username,
            'displayname' => $userInfo[0]->displayname,
            'email' => $userInfo[0]->email,
            'role' => $userInfo[0]->role,
            'iconPath' => $userInfo[0]->icon_path
        );
            return json_encode($data);
        }
        return json_encode(false);
    }

    /**
     * @param Request $request
     * @return string
     */
    public function register(Request $request)
    {
        $username = $request->name;
        $password = $request->password;
        $condition = ['username'=> $username, 'category'=> 'general'];
        $userInfo = User::where($condition)->get();
        if(count($userInfo)>0)
            return json_encode(false);
        $user = new User();
        $user->username = $username;
        $user->displayname = $username;
        $user->password = Hash::make($password);
        $user->email = 'example.gmail.com';
        $user->icon_path = 'http://101.78.175.101:6780/storage/2018-01-05-00-19-01.jpeg';
        $user->role = 'user';
        $user->category = 'general';
        $user->save();
        return json_encode(true);
    }

    /**
     * @param Request $request
     * @return string
     */
    public function fbLogin(Request $request)
    {
        $username = $request->name;
        $email = $request->email;
        $iconPath = $request->iconPath;

        $condition = ['username'=> $username, 'category'=> 'facebook'];
        $userInfo = User::where($condition)->get();
        if(count($userInfo) > 0) {
            $data[] = array(
                'username' => $userInfo[0]->username,
                'displayname' => $userInfo[0]->displayname,
                'email' => $userInfo[0]->email,
                'iconPath' => $userInfo[0]->icon_path,
                'role' => $userInfo[0]->role
            );
            return json_encode($data);
        }

        //FB user first time login
        $user = new User();
        $user->username = $username;
        $user->displayname = $username;
        $user->password = Hash::make("facebookUser");
        $user->email = $email;
        $user->icon_path = $iconPath;
        $user->role = 'user';
        $user->category = 'facebook';
        $user->save();

        $data[] = array(
            'username' => $username,
            'displayname' => $username,
            'email' => $email,
            'iconPath' => $iconPath,
            'role' => 'user'
        );
        return json_encode($data);
    }

    /**post data
     * @param Request $request
     * @return string
     */
public function test2(Request $request) {
        //dd($request->username);
    $data[] = array(
        'accountName' => 'derek',
        'amount' => 'try',
        'data' => $request->username
    );

//    $account = new Account();
//    $account->accountName = "UserTesting";
//    $account->password = '123123123';
//    $account->username = 'derek';
//    $account->update
//    $account->role_id = 1;
//    $account->save();
    $permission = new Permission();
    $permission->name = "write";
    $permission->remember_token = "do it";
    $permission->save();
    return json_encode($data);
}

}
