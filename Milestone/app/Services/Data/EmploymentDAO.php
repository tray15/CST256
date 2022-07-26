<?php
/*
 * CST-256 Milestone Project
 * Version - 1
 * Module - E-Portfolio
 * Module Version - 1
 * Programmer: Hiram Viezca
 * Date 7/25/2022
 * Synopsis: The EmploymentDAO handles the
 * database interaction for Employment History
 * */
namespace App\Services\Data;

use App\Models\EducationModel;
use App\Models\EmploymentModel;
use Illuminate\Support\Facades\DB;

class EmploymentDAO
{
    /**
     * @param EmploymentModel $job
     * @return mixed
     */
    public function saveEmployment(EmploymentModel $job)
    {
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

    /**
     * @param int $userid
     * @return mixed
     */
    public function findAllByUserId(int $userid)
    {
        return DB::table('job_hist')->where('user_id', $userid)->get();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findById(int $id)
    {
        return DB::table('job_hist')->where('id', $id)->first();
    }

    /**
     * @param EmploymentModel $job
     * @return mixed
     */
    public function updateEmployment(EmploymentModel $job)
    {
        return DB::table('job_hist')->where('id', $job->getId())
            ->update([
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

    /**
     * @param int $id
     * @return mixed
     */
    public function deleteEmployment(int $id)
    {
        return DB::table('job_hist')->delete($id);
    }
}