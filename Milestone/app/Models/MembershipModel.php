<?php
/*
 * CST-256 Milestone Project
 * Version - 1
 * Module - Job Match
 * Module Version - 1
 * Programmer: Hiram Viezca
 * Date 7/25/2022
 * Synopsis: The MembershipModel defines the
 * Membership Model object. Includes standard
 * constructor and getters/setters.
 * */
namespace App\Models;

class MembershipModel
{
    private $id;
    private $group_id;
    private $profile_id;
    /**
     * @param $id
     * @param $group_id
     * @param $profile_id
     */public function __construct($id, $group_id, $profile_id)
    {
        $this->id = $id;
        $this->group_id = $group_id;
        $this->profile_id = $profile_id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getGroupId()
    {
        return $this->group_id;
    }

    /**
     * @param mixed $group_id
     */
    public function setGroupId($group_id)
    {
        $this->group_id = $group_id;
    }

    /**
     * @return mixed
     */
    public function getProfileId()
    {
        return $this->profile_id;
    }

    /**
     * @param mixed $profile_id
     */
    public function setProfileId($profile_id)
    {
        $this->profile_id = $profile_id;
    }
}