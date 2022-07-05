<?php

namespace App\Services\Business;

use App\Models\EducationModel;
use App\Models\EmploymentModel;
use App\Services\Data\EducationDAO;
use phpDocumentor\Reflection\Types\Array_;
use function Sodium\add;

class EducationService
{
    public function findByUserId(int $id)
    {
        $dao = new EducationDAO();
        $records = $dao->findByUserId($id);
        $models = [];

        if($records) {
            foreach ($records as $record) {
                $model = new EducationModel($record->id,
                    $record->school_name,
                    $record->address,
                    $record->phone,
                    $record->degree,
                    $record->start_date,
                    $record->end_date,
                    $record->user_id);
                $models[] = $model;
            }
            return $models;
        }
        else {
            return null;
        }

    }
    public function findById(int $id) {
        $dao = new EducationDAO();
        return $dao->findById($id);
    }

    public function saveEducation(EducationModel $edu) {
        $dao = new EducationDAO();
        return $dao->saveEducation($edu);
    }

    public function updateEducation(EducationModel $edu)
    {
        $dao = new EducationDAO();
        return $dao->updateEducation($edu);
    }

    public function deleteEducation(int $id)
    {
        $dao = new EducationDAO();
        $dao->deleteEducation($id);
    }
}