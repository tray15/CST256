<?php
namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Services\Business\SecurityService;
use App\Services\Utility\MyLogger;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    private $logger;

    function __construct() {
        $this->logger = new MyLogger();
    }

    public function createUser()
    {
        $this->logger->info('Entering UserController.createUser()');
        $this->logger->info('Exiting UserController.createUser()');
        return view('register');
    }

    public function saveUser(Request $request)
    {
        $this->logger->info('Entering UserController.saveUser()');
        $service = new SecurityService();
        $username = $request->get("username");
        $password = $request->get('password');
        $role = "user";
        $suspended = false;

        $this->validateForm($request);

        $user = new UserModel($request->username, $request->password, $role, $suspended);
        if ($service->create($user)) {
            $this->logger->info('Exiting UserController.saveUser() : Save Successful');
            return view('login');
        } else {
            $this->logger->info('Exiting UserController.saveUser() : Save Failed...');
            return view('registrationFailed');
        }
    }

    private function validateForm(Request $request)
    {
        $this->logger->info('Entering UserController.validateForm()');
        // Setup Data Validation Rules for Login Form
        $rules = [
            'username' => 'Required | Between:4,10 | Alpha',
            'password' => 'Required | Between:4,10'
        ];

        // Run Data Validation Rules
        $this->validate($request, $rules);
        $this->logger->info('Exiting UserController.validateForm()');
    }
}
