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
    public function save(UserModel $user) {
        $response = DB::table('users')->insert(['username' => $user->getUsername(), 'password' => $user->getPassword(), 'updated_at'=> now(), 'created_at' => now()]);
        return $response;
    }
}

