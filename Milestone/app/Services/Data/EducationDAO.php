<?php
/*
 * CST-256 Milestone Project
 * Version - 1
 * Module - E-Portfolio
 * Module Version - 1
 * Programmer: Hiram Viezca
 * Date 7/25/2022
 * Synopsis: The EducationDAO handles the
 * database interaction for Education History
 * */
namespace App\Services\Data;

use App\Models\EducationModel;
use Illuminate\Support\Facades\DB;

class EducationDAO
{
    /**
     * @param int $id
     * @return mixed
     */
    public function findByUserId(int $id)
    {
        return DB::table('edu_hist')->where('user_id', $id)->get();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findById(int $id)
    {
        return DB::table('edu_hist')->where('id', $id)->first();
    }

    /**
     * @param EducationModel $edu
     * @return mixed
     */
    public function saveEducation(EducationModel $edu)
    {
        return DB::table('edu_hist')->insertGetId([
            'school_name' => $edu->getSchoolName(),
            'address' => $edu->getAddress(),
            'phone' => $edu->getPhone(),
            'degree' => $edu->getDegree(),
            'start_date' => $edu->getStartDate(),
            'end_date' => $edu->getEndDate(),
            'user_id' => $edu->getUserId()
        ]);
    }

    /**
     * @param EducationModel $edu
     * @return mixed
     */
    public function updateEducation(EducationModel $edu)
    {
        return DB::table('edu_hist')->where('id', $edu->getId())
            ->update([
            'school_name' => $edu->getSchoolName(),
            'address' => $edu->getAddress(),
            'phone' => $edu->getPhone(),
            'degree' => $edu->getDegree(),
            'start_date' => $edu->getStartDate(),
            'end_date' => $edu->getEndDate()
        ]);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function deleteEducation(int $id)
    {
        return DB::table('edu_hist')->delete($id);
    }
}