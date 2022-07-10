<?php
namespace App\Services\Business;

use App\Services\Data\SecurityDAO;
use App\Models\UserUpdateModel;

class AdminService
{

    private $dao;

    function __construct()
    {
        $this->dao = new SecurityDAO();
    }
    
    public function canEditUser($id) {
        $user = $this->dao->getUser($id);
        if ($user == false) {
            return null;
        }
        return $user;
    }

    public function deleteUser($id)
    {
        $result = $this->dao->delete($id);
        return $result;
    }

    public function listAllUsers()
    {
        $users = $this->dao->list();
        return $users;
    }

    public function modifyUser(UserUpdateModel $user)
    {
        $exists = $this->dao->getUser($user->getId());
        $un = $user->getUsername();
        $role = $user->getRole();
        $sus = $user->getSuspended();

        if (!($exists->username == $un) or !($exists->role == $role) or !((bool) $exists->suspended == $sus)) {
            $result = $this->dao->update($user->getId(), [
                'username' => $user->getUsername(),
                'role' => $user->getRole(),
                'suspended' => $user->getSuspended(),   
            ]);
               return $result;              
        }
        return true;        
    }
}

