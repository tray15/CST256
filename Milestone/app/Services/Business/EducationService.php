<?php
/*
 * CST-256 Milestone Project
 * Version - 1
 * Module - E-Portfolio
 * Module Version - 1
 * Programmer: Hiram Viezca
 * Date 7/25/2022
 * Synopsis: The EducationService defines the
 * business logic for Education History
 * */
namespace App\Services\Business;

use App\Models\EducationModel;
use App\Models\EmploymentModel;
use App\Services\Data\EducationDAO;
use phpDocumentor\Reflection\Types\Array_;
use function Sodium\add;

class EducationService
{
    private $dao;

    function __construct() {
        $this->dao = new EducationDAO();
    }

    /**
     * @param int $id
     * @return array|null
     */
    public function findByUserId(int $id)
    {
        $records = $this->dao->findByUserId($id);
        $models = [];

        if ($records) {
            foreach ($records as $record) {
                $model = new EducationModel($record->id, $record->school_name, $record->address, $record->phone, $record->degree, $record->start_date, $record->end_date, $record->user_id);
                $models[] = $model;
            }
            return $models;
        } else {
            return null;
        }
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
     * @param EducationModel $edu
     * @return mixed
     */
    public function saveEducation(EducationModel $edu)
    {
        return $this->dao->saveEducation($edu);
    }

    /**
     * @param EducationModel $edu
     * @return mixed
     */
    public function updateEducation(EducationModel $edu)
    {
        return $this->dao->updateEducation($edu);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function deleteEducation(int $id)
    {
        return $this->dao->deleteEducation($id);
    }
}