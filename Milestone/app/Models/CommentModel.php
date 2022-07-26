<?php
/*
 * CST-256 Milestone Project
 * Version - 1
 * Module - Affinity Groups
 * Module Version - 1
 * Programmer: Hiram Viezca
 * Date 7/25/2022
 * Synopsis: The CommentModel defines the
 * Comment Model object. Includes standard
 * constructor and getters/setters.
 * */
namespace App\Models;

class CommentModel
{
    private $id;
    private $text;
    private $created_at;
    private $profile_id;
    private $group_id;

    /**
     * @param $id
     * @param $text
     * @param $created_at
     * @param $profile_id
     * @param $group_id
     */
    public function __construct($id, $text, $created_at, $profile_id, $group_id)
    {
        $this->id = $id;
        $this->text = $text;
        $this->created_at = $created_at;
        $this->profile_id = $profile_id;
        $this->group_id = $group_id;
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
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
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
}