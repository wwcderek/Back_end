<?php

namespace App\Http\Controllers;
use App\Models\Permission;
use App\Models\User;
use App\Http\Requests ;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Providers\Validator;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    //
    public function __construct() {
    }

    /** get request
     * @param Request $request
     * @param $userName
     * @param $test
     * @return string
     */
    public function test(Request $request)
    {
//        $data[] = array(
//            'accountName' => $userName,
//            'amount' => 'try',
//            'data' => $test
//        );
        $password = Hash::make('a12345678');
        if(Hash::check('a123456789', $password))
            dd("true");
        dd('false');

       // return json_encode($data);
    }

    public function login(Request $request)
    {
        $username = $request->name;
        $password = $request->password;
        $userInfo = User::where(['username'=>$username])->get();
        if(count($userInfo) > 0) {
            return json_encode($userInfo);
        }
        return json_encode(false);
    }

    public function register(Request $request)
    {
        $username = $request->name;
        $password = $request->password;

        $userInfo = User::where(['username'=>$username, 'password'=>$password])->get();
        if(count($userInfo)>0)
            return json_encode(false);
        $user = new User();
        $user->username = $username;
        $user->password = Hash::make($password);
        $user->email = 'example.gmail.com';
        $user->role = 'user';
        $user->save();
        return json_encode(true);
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
