<?php
namespace App\Services\Business;

use App\Models\ProfileModel;
use App\Services\Data\ProfileDAO;

class ProfileService
{
    public function findById($id) {
        $dao = new ProfileDAO();
        $record = $dao->findById($id);
        return new ProfileModel(
          //$record->id,
          $record->firstname,
          $record->lastname,
          $record->address,
          $record->phone,
          $record->email,
          $record->user_id
        );
    }

    /**
     *
     * @param int $id
     * @return mixed
     */
    public function findByUserId(int $id)
    {
        $dao = new ProfileDAO();
        return $dao->findByUserId($id);
    }

    public function saveProfile(ProfileModel $profile)
    {
        $dao = new ProfileDAO();
        return $dao->saveProfile($profile);
    }
}