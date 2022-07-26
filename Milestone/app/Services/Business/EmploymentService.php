<?php
/*
 * CST-256 Milestone Project
 * Version - 1
 * Module - E-Portfolio
 * Module Version - 1
 * Programmer: Hiram Viezca
 * Date 7/25/2022
 * Synopsis: The EmploymentService defines the
 * business logic for Employment History
 * */
namespace App\Services\Business;

use App\Models\EducationModel;
use App\Models\EmploymentModel;
use App\Services\Data\EducationDAO;
use App\Services\Data\EmploymentDAO;

class EmploymentService
{
    private $dao;

    function __construct() {
        $this->dao = new EmploymentDAO();
    }

    /**
     * @param EmploymentModel $job
     * @return mixed
     */
    public function saveEmployment(EmploymentModel $job)
    {
        return $this->dao->saveEmployment($job);
    }

    /**
     * @param $userid
     * @return array
     */
    public function findAllByUserId($userid)
    {
        $records = $this->dao->findAllByUserId($userid);
        $models = [];
        foreach ($records as $record) {
            $model = new EmploymentModel($record->id, $record->company_name, $record->address, $record->phone, $record->job_title, $record->duties, $record->supervisor, $record->separation_reason, $record->start_date, $record->end_date, $record->user_id);
            $models[] = $model;
        }
        return $models;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findById(int $id)
    {
        return $this->dao->findById($id);
    }

    /**
     * @param EmploymentModel $job
     * @return mixed
     */
    public function updateEmployment(EmploymentModel $job)
    {
        return $this->dao->updateEmployment($job);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function deleteEmployment(int $id)
    {
        return $this->dao->deleteEmployment($id);
    }
}