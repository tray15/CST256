<?php
/*
 * CST-256 Milestone Project
 * Version - 1
 * Module - E-Portfolio
 * Module Version - 1
 * Programmer: Hiram Viezca
 * Date 7/25/2022
 * Synopsis: The EducationModel defines the
 * Education Model object. Includes standard
 * constructor and getters/setters.
 * */
namespace App\Models;

class EducationModel
{
    private $id;
    private $school_name;
    private $address;
    private $phone;
    private $degree;
    private $start_date;
    private $end_date;
    private $user_id;

    /**
     *
     * @param $id
     * @param $school_name
     * @param $address
     * @param $phone
     * @param $degree
     * @param $start_date
     * @param $end_date
     * @param $user_id
     */
    public function __construct($id, $school_name, $address, $phone, $degree, $start_date, $end_date, $user_id)
    {
        $this->id = $id;
        $this->school_name = $school_name;
        $this->address = $address;
        $this->phone = $phone;
        $this->degree = $degree;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->user_id = $user_id;
    }

    /**
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     *
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     *
     * @return mixed
     */
    public function getSchoolName()
    {
        return $this->school_name;
    }

    /**
     *
     * @param mixed $school_name
     */
    public function setSchoolName($school_name)
    {
        $this->school_name = $school_name;
    }

    /**
     *
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     *
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     *
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     *
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     *
     * @return mixed
     */
    public function getDegree()
    {
        return $this->degree;
    }

    /**
     *
     * @param mixed $degree
     */
    public function setDegree($degree)
    {
        $this->degree = $degree;
    }

    /**
     *
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->start_date;
    }

    /**
     *
     * @param mixed $start_date
     */
    public function setStartDate($start_date)
    {
        $this->start_date = $start_date;
    }

    /**
     *
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->end_date;
    }

    /**
     *
     * @param mixed $end_date
     */
    public function setEndDate($end_date)
    {
        $this->end_date = $end_date;
    }

    /**
     *
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     *
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }
}