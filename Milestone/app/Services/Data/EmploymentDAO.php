<?php

namespace App\Services\Data;

use App\Models\EducationModel;
use App\Models\EmploymentModel;
use Illuminate\Support\Facades\DB;

class EmploymentDAO
{
    public function saveEmployment(EmploymentModel $job) {
        return DB::table('job_hist')->insertGetId([
            'id' => $job->getId(),
            'company_name' => $job->getCompanyName(),
            'address' => $job->getAddress(),
            'phone' => $job->getPhone(),
            'job_title' => $job->getJobTitle(),
            'duties' => $job->getDuties(),
            'supervisor' => $job->getSupervisor(),
            'separation_reason' => $job->getSeparationReason(),
            'start_date' => $job->getStartDate(),
            'end_date' => $job->getEndDate(),
            'user_id' => $job->getUserid()
        ]);
    }

    public function findAllByUserId(int $userid)
    {
        return DB::table('job_hist')->where('user_id', $userid)->get();
    }

    public function findById(int $id) {
        return DB::table('job_hist')->where('id', $id)->first();
    }

    public function updateEmployment(EmploymentModel $job)
    {
        return DB::table('job_hist')->where('id', $job->getId())->update([
            'company_name' => $job->getCompanyName(),
            'address' => $job->getAddress(),
            'phone' => $job->getPhone(),
            'job_title' => $job->getJobTitle(),
            'duties' => $job->getDuties(),
            'supervisor' => $job->getSupervisor(),
            'separation_reason' => $job->getSeparationReason(),
            'start_date' => $job->getStartDate(),
            'end_date' => $job->getEndDate()
        ]);
    }

    public function deleteEmployment(int $id)
    {
        return DB::table('job_hist')->delete($id);
    }
}