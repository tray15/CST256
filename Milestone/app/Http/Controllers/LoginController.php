<?php
/*
 * CST-256 Milestone Project
 * Version - 1
 * Module - Login and Registration
 * Module Version - 1
 * Programmer: Hiram Viezca & Tanner Ray
 * Date 7/25/2022
 * Synopsis: The LoginController handles functions
 * specific to Logging in and out of the application.
 * */
namespace App\Http\Controllers;

use App\Services\Business\ProfileService;
use App\Services\Utility\MyLogger;
use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Services\Business\SecurityService;

class LoginController extends Controller
{
    private $securityService;
    private $profileService;
    private $logger;

    public function __construct() {
        $this->securityService = new SecurityService();
        $this->profileService = new ProfileService();
        $this->logger = new MyLogger();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $this->logger->info('Entering LoginController.index()');
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
                $this->logger->info('Exiting LoginController.index() : User Profile Found!');
                return view('home')->with('firstname', $profile->firstname);
            } else {
                $request->session()->put('userid', $user->id);
                $this->logger->info('Exiting LoginController.index() : User Profile Not Found...');
                return redirect()->route('createProfile');
            }
        } else {
            $this->logger->info('Exiting LoginController.index() : Login Failed...');
            return view('loginFailed')->with('username', $user);
        }
    }

    /**
     * @return \Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout() {
        $this->logger->info('Entering LoginController.logout()');
        session()->invalidate();
        $this->logger->info('Exiting LoginController.logout()');
        return redirect(route('login'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function home() {
        $this->logger->info('Entering LoginController.home()');
        $profileId = session('profileid');
        if($profileId != null){
            $profile = $this->profileService->findById($profileId);
            $this->logger->info('Exiting LoginController.home() : Going to user home');
            return view('home')->with('firstname', $profile->getFirstname());
        }
        else{
            $this->logger->info('Exiting LoginController.home() : Going back to Login');
            return redirect(route('login'));
        }
    }

    /**
     * @param Request $request
     * @return void
     */
    private function validateForm(Request $request)
    {
        $this->logger->info('Entering LoginController.validateForm()');
        // Setup Data Validation Rules for Login Form
        $rules = [
            'username' => 'Required | Between:4,10 | Alpha',
            'password' => 'Required | Between:4,10'
        ];

        // Run Data Validation Rules
        $this->validate($request, $rules);
        $this->logger->info('Exiting LoginController.validateForm()');
    }
}
