<?php
namespace App\Http\Controllers;

use App\Services\Business\ProfileService;
use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Services\Business\SecurityService;

class LoginController extends Controller
{

    public function index(Request $request)
    {
        $securityService = new SecurityService();
        $profileService = new ProfileService();
        $username = $request->input('username');
        $password = $request->input('password');

        // Validate form
        $this->validateForm($request);

        $user = new UserModel($username, $password, "", "");
        $result = $securityService->login($user);

        if ($result) {
            // return view('loginPassed')->with('username', $user);
            $user = $securityService->findByUser($user);
            $profile = $profileService->findByUserId($user->id);
            if ($profile) {
                $request->session()->put('userid', $user->id);
                $request->session()->put('username', $user->username);
                $request->session()->put('profileid', $profile->id);
                return view('home')->with('firstname', $profile->firstname);
            } else {
                $request->session()->put('userid', $user->id);
                return redirect()->route('createProfile');
            }
        } else {
            return view('loginFailed')->with('username', $user);
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
