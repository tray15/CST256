<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Services\Business\SecurityService;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function createUser() {
        return view('register');
    }
    
    public function saveUser(Request $request) {
        //dd(request()->all());
        $service = new SecurityService();
        $user = new UserModel($request->username, $request->password);
        if ($service->create($user)) {
            return view('login');
        }
        else {
            return view('registrationFailed');
        }

    }
}
