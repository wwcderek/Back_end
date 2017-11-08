<?php

namespace App\Http\Controllers;
use App\Models\Account;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Requests ;
use Illuminate\Http\Request;
use App\Providers\Validator;
use Illuminate\Support\Facades\Auth;
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
public function test(Request $request, $userName, $test)
{
    //error_log(print_r($input,true), 3,"/Applications/XAMPP/xamppfiles/htdocs/ionic3_project/test.log" );
    $data[] = array(
        'accountName' => $userName,
        'amount' => 'try',
        'data' => $test
    );
    return json_encode($data);
}

public function login(Request $request)
{
//    $attempt = Auth::attempt([
//        'name' => $request->name,
//        'password' => $request->password
//    ]);
//    if($attempt)
        return json_encode(true);
    //return json_encode(false);
}


public function test3()
{
    $user = User::all();
 dd($user);
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
