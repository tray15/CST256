<?php
namespace App\Services\Business;

use App\Models\UserModel;
use App\Services\Data\SecurityDAO;
use Illuminate\Support\Facades\DB;

class SecurityService
{
    public function findByUser(UserModel $user) {
        $dao = new SecurityDAO();
        return $dao->findByUser($user);
    }

    /**
     * @param UserModel $user
     * @return bool
     */
    public function login(UserModel $user) {
        $dao = new SecurityDAO();
        $query = $dao->findByUser($user);
        return (isset($query->id));
    }
    public function create(UserModel $user) {
        $dao = new SecurityDAO();
        if ($dao->findByUser($user)) {
            return view('registrationFailed');
        } else {
            return $dao->save($user);
        }
    }
}

