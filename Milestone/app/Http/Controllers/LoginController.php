<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Services\Business\SecurityService;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $securityService = new SecurityService();
        $username=$request->input('username');
        $password=$request->input('password');
        
        //echo "Username is: " . $username .  " Password is: " . $password;
        
        $user = new UserModel($username, $password);
        $result = $securityService->login($user);
        if ($result) {
            return view('loginPassed')->with('username', $user);
        }
        return view('loginFailed');
    }
}
