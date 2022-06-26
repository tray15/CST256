<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function createUser() {
        return view('register');
    }
    
    public function saveUser(Request $request) {
        //dd(request()->all());
        
        $user = new User;
        $user->username = $request->username;
        $user->password = $request->password;
        
        $user->save();
    }
}
