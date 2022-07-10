<?php
namespace App\Http\Controllers;

use App\Services\Business\AdminService;
use Illuminate\Http\Request;
use App\Models\UserUpdateModel;

class AdminController extends Controller
{

    public function index()
    {
        $service = new AdminService();
        $users = $service->listAllUsers();

        return view('admin')->with('users', $users);
    }
    
    public function delete($id)
    {
        $service = new AdminService();
        
        $service->deleteUser($id);
        return redirect('admin');
    }
    
    public function doUserUpdate(Request $request, $id) {
        $username = $request->input('username');
        $role = $request->input('role');
        
        $suspended = $request->input('suspended') == NULL ? false : true;
        
        $user = new UserUpdateModel($id, $username, $role, $suspended);
        
        $service = new AdminService();
        $service->modifyUser($user);
        return redirect('admin');
    }
    
    public function edit($id) {
        $service = new AdminService();
        $user = $service->canEditUser($id);
        if (isset($user)) {
            return view('userEdit')->with('user', $user);
        }
        return redirect('index');
    }
}
