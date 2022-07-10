<?php
namespace App\Services\Data;

use App\Models\UserModel;
use Illuminate\Support\Facades\DB;

class SecurityDAO
{

    /**
     *
     * @param UserModel $user
     * @return mixed
     */
    public function findByUser(UserModel $user)
    {
        $response = DB::table('users')->where('username', $user->getUsername())
            ->where('password', $user->getPassword())
            ->first();
        return $response;
    }

    public function findById($id)
    {
        DB::table('users')->where('id', $id)->get();
    }
    
    public function getUser($id) {
        $response = DB::table('users')->where('id', $id)->first();
        if (isset($response)) {
            return $response;
        } else {
            return null;
        }
    }

    public function save(UserModel $user)
    {
        $response = DB::table('users')->insert([
            'username' => $user->getUsername(),
            'password' => $user->getPassword(),
            'role' => $user->getRole(),
            'suspended' => $user->getSuspended(),
            'updated_at' => now(),
            'created_at' => now()
        ]);
        return $response;
    }
    
    public function list($filter = []) {
        return DB::table('users')->where($filter)->get();
    }
    
    public function delete($id) {
        return DB::table('users')->where('id', $id)->delete();
    }
    
    public function update($id, $input) {
        DB::table('users')->where('id', $id)->update($input);
        
        return $this->getUser($id);
    }
}