<?php
namespace App\Http\Controllers;

use App\Services\Business\ProfileService;
use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Services\Business\SecurityService;

class LoginController extends Controller
{
    private $securityService;
    private $profileService;

    public function __construct() {
        $this->securityService = new SecurityService();
        $this->profileService = new ProfileService();
    }

    public function index(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        // Validate form
        $this->validateForm($request);

        $user = new UserModel($username, $password, "", "");
        $result = $this->securityService->login($user);

        if ($result) {
            // return view('loginPassed')->with('username', $user);
            $user = $this->securityService->findByUser($user);
            $profile = $this->profileService->findByUserId($user->id);
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

    public function logout() {
        session()->invalidate();
        return redirect(route('login'));
    }

    public function home() {
        $profileId = session('profileid');
        if($profileId != null){
            $profile = $this->profileService->findById($profileId);
            return view('home')->with('firstname', $profile->getFirstname());
        }
        else{
            return redirect(route('login'));
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
