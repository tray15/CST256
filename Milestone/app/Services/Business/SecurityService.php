<?php
namespace App\Services\Business;

use App\Models\UserModel;
use App\Services\Data\SecurityDAO;
use Illuminate\Support\Facades\DB;

class SecurityService
{
    public function login(UserModel $user) {
        $dao = new SecurityDAO();
        $query = $dao->findByUser($user);
        return (isset($query->ID));
    }
    public function create(UserModel $user) {
        $dao = new SecurityDAO();
        if ($dao->findByUser($user)->count() > 0) {
            return view('registrationFailed');
        } else {
            $response = DB::table('users')->insert(['username' => $user['username'], 'password' => $user['password']]);
            return $response;
        }
    }
}

