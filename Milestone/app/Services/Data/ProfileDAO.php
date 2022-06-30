<?php

namespace App\Services\Data;

use App\Models\ProfileModel;
use Illuminate\Support\Facades\DB;

class ProfileDAO
{
    /**
     * @param int $id
     * @return mixed
     */
    public function findById(int $id) {
        return DB::table('profiles')->where('id', $id)->first();
    }

    public function saveProfile(ProfileModel $profile)
    {
        return DB::table('profiles')->insert([
            'firstname' => $profile->getFirstname(),
            'lastname' => $profile->getLastname(),
            'address' => $profile->getAddress(),
            'phone' => $profile->getPhone(),
            'email' => $profile->getemail(),
            'user_id' => $profile->getUserId()
        ]);
    }
}