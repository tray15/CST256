<?php
/*
 * CST-256 Milestone Project
 * Version - 1
 * Module - Member Profile
 * Module Version - 1
 * Programmer: Hiram Viezca
 * Date 7/25/2022
 * Synopsis: The ProfileDAO handles the
 * database interaction for Profiles
 * */
namespace App\Services\Data;

use App\Models\ProfileModel;
use Illuminate\Support\Facades\DB;

class ProfileDAO
{
    /**
     * @param $id
     * @return mixed
     */
    public function findById($id) {
        return DB::table('profiles')->where('id', $id)->first();
    }

    /**
     *
     * @param int $id
     * @return mixed
     */
    public function findByUserId(int $id)
    {
        return DB::table('profiles')->where('user_id', $id)->first();
    }

    /**
     * @param ProfileModel $profile
     * @return mixed
     */
    public function saveProfile(ProfileModel $profile)
    {
        return DB::table('profiles')->insertGetId([
            'firstname' => $profile->getFirstname(),
            'lastname' => $profile->getLastname(),
            'address' => $profile->getAddress(),
            'phone' => $profile->getPhone(),
            'email' => $profile->getemail(),
            'user_id' => $profile->getUserId()
        ]);
    }
}