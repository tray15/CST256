<?php
/*
 * CST-256 Milestone Project
 * Version - 1
 * Module - Member Profiles
 * Module Version - 1
 * Programmer: Hiram Viezca
 * Date 7/25/2022
 * Synopsis: The ProfileService defines the
 * business logic for Profiles
 * */
namespace App\Services\Business;

use App\Models\ProfileModel;
use App\Services\Data\ProfileDAO;

class ProfileService
{
    private $dao;

    function __construct() {
        $this->dao = new ProfileDAO();
    }

    /**
     * @param $id
     * @return ProfileModel
     */
    public function findById($id) {
        $record = $this->dao->findById($id);
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
        return $this->dao->findByUserId($id);
    }

    /**
     * @param ProfileModel $profile
     * @return mixed
     */
    public function saveProfile(ProfileModel $profile)
    {
        return $this->dao->saveProfile($profile);
    }
}