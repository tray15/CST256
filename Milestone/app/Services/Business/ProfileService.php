<?php

namespace App\Services\Business;

use App\Models\ProfileModel;
use App\Services\Data\ProfileDAO;

class ProfileService
{
    /**
     * @param int $id
     * @return mixed
     */
    public function findById(int $id) {
        $dao = new ProfileDAO();
        return $dao->findById($id);
    }

    public function saveProfile(ProfileModel $profile)
    {
        $dao = new ProfileDAO();
        return $dao->saveProfile($profile);
    }
}