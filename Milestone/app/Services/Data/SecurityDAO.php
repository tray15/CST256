<?php
namespace App\Services\Data;

use App\Models\UserModel;
use Illuminate\Support\Facades\DB;

class SecurityDAO
{
    
    public function findByUser(UserModel $user)
    {
        $response = DB::table('users')->where('username', $user->getUsername())->where('password', $user->getPassword())->first();
        return $response;
    }
}

