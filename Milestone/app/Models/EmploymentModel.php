<?php

namespace App\Models;

class EmploymentModel
{
    private $id;
    private $company_name;
    private $address;
    private $phone;
    private $job_title;
    private $duties;
    private $supervisor;
    private $separation_reason;
    private $start_date;
    private $end_date;
    private $userid;

    /**
     * @param $id
     * @param $company_name
     * @param $address
     * @param $phone
     * @param $job_title
     * @param $duties
     * @param $supervisor
     * @param $separation_reason
     * @param $start_date
     * @param $end_date
     * @param $userid
     */
    public function __construct($id, $company_name, $address, $phone, $job_title, $duties, $supervisor, $separation_reason, $start_date, $end_date, $userid)
    {
        $this->id = $id;
        $this->company_name = $company_name;
        $this->address = $address;
        $this->phone = $phone;
        $this->job_title = $job_title;
        $this->duties = $duties;
        $this->supervisor = $supervisor;
        $this->separation_reason = $separation_reason;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->userid = $userid;
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
    public function getCompanyName()
    {
        return $this->company_name;
    }

    /**
     * @param mixed $company_name
     */
    public function setCompanyName($company_name)
    {
        $this->company_name = $company_name;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getJobTitle()
    {
        return $this->job_title;
    }

    /**
     * @param mixed $job_title
     */
    public function setJobTitle($job_title)
    {
        $this->job_title = $job_title;
    }

    /**
     * @return mixed
     */
    public function getDuties()
    {
        return $this->duties;
    }

    /**
     * @param mixed $duties
     */
    public function setDuties($duties)
    {
        $this->duties = $duties;
    }

    /**
     * @return mixed
     */
    public function getSupervisor()
    {
        return $this->supervisor;
    }

    /**
     * @param mixed $supervisor
     */
    public function setSupervisor($supervisor)
    {
        $this->supervisor = $supervisor;
    }

    /**
     * @return mixed
     */
    public function getSeparationReason()
    {
        return $this->separation_reason;
    }

    /**
     * @param mixed $separation_reason
     */
    public function setSeparationReason($separation_reason)
    {
        $this->separation_reason = $separation_reason;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->start_date;
    }

    /**
     * @param mixed $start_date
     */
    public function setStartDate($start_date)
    {
        $this->start_date = $start_date;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->end_date;
    }

    /**
     * @param mixed $end_date
     */
    public function setEndDate($end_date)
    {
        $this->end_date = $end_date;
    }

    /**
     * @return mixed
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * @param mixed $userid
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;
    }
}