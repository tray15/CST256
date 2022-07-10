<?php
namespace App\Services\Business;

use App\Models\EducationModel;
use App\Models\EmploymentModel;
use App\Services\Data\EducationDAO;
use App\Services\Data\EmploymentDAO;

class EmploymentService
{

    public function saveEmployment(EmploymentModel $job)
    {
        $dao = new EmploymentDAO();
        return $dao->saveEmployment($job);
    }

    public function findAllByUserId($userid)
    {
        $dao = new EmploymentDAO();
        $records = $dao->findAllByUserId($userid);
        $models = [];
        foreach ($records as $record) {
            $model = new EmploymentModel($record->id, $record->company_name, $record->address, $record->phone, $record->job_title, $record->duties, $record->supervisor, $record->separation_reason, $record->start_date, $record->end_date, $record->user_id);
            $models[] = $model;
        }
        return $models;
    }

    public function findById(int $id)
    {
        $dao = new EmploymentDAO();
        return $dao->findById($id);
    }

    public function updateEmployment(EmploymentModel $job)
    {
        $dao = new EmploymentDAO();
        return $dao->updateEmployment($job);
    }

    public function deleteEmployment(int $id)
    {
        $dao = new EmploymentDAO();
        $dao->deleteEmployment($id);
    }
}