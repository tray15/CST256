<?php
namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Services\Business\SecurityService;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

    public function createUser()
    {
        return view('register');
    }

    public function saveUser(Request $request)
    {
        $service = new SecurityService();
        $username = $request->get("username");
        $password = $request->get('password');
        $role = "user";
        $suspended = false;

        $this->validateForm($request);

        $user = new UserModel($request->username, $request->password, $role, $suspended);
        if ($service->create($user)) {
            return view('login');
        } else {
            return view('registrationFailed');
        }
    }

    private function validateForm(Request $request)
    {
        // Setup Data Validation Rules for Login Form
        $rules = [
            'username' => 'Required | Between:4,10 | Alpha',
            'password' => 'Required | Between:4,10'
        ];

        // Run Data Validation Rules
        $this->validate($request, $rules);
    }
}
