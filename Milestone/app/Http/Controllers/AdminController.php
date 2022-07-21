<?php
namespace App\Http\Controllers;

use App\Services\Business\AdminService;
use App\Services\Utility\MyLogger;
use Illuminate\Http\Request;
use App\Models\UserUpdateModel;

class AdminController extends Controller
{
    private $logger;

    function __construct() {
        $this->logger = new MyLogger();
    }

    public function index()
    {
        $this->logger->info('Entering AdminController.index()');
        $service = new AdminService();
        $users = $service->listAllUsers();

        $this->logger->info('Exiting AdminController.index()');
        return view('admin')->with('users', $users);
    }
    
    public function delete($id)
    {
        $this->logger->info('Entering AdminController.delete()');
        $service = new AdminService();
        
        $service->deleteUser($id);
        $this->logger->info('Exiting AdminController.delete()');
        return redirect('admin');
    }
    
    public function doUserUpdate(Request $request, $id) {
        $this->logger->info('Entering AdminController.doUserUpdate()');
        $username = $request->input('username');
        $role = $request->input('role');
        
        $suspended = $request->input('suspended') == NULL ? false : true;
        
        $user = new UserUpdateModel($id, $username, $role, $suspended);
        
        $service = new AdminService();
        $service->modifyUser($user);
        $this->logger->info('Exiting AdminController.doUserUpdate()');
        return redirect('admin');
    }
    
    public function edit($id) {
        $this->logger->info('Entering AdminController.edit()');
        $service = new AdminService();
        $user = $service->canEditUser($id);
        if (isset($user)) {
            return view('userEdit')->with('user', $user);
        }
        $this->logger->info('Exiting AdminController.edit()');
        return redirect('index');
    }
}
