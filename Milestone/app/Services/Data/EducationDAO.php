<?php
namespace App\Services\Data;

use App\Models\EducationModel;
use Illuminate\Support\Facades\DB;

class EducationDAO
{

    public function findByUserId(int $id)
    {
        return DB::table('edu_hist')->where('user_id', $id)->get();
    }

    public function findById(int $id)
    {
        return DB::table('edu_hist')->where('id', $id)->first();
    }

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

    public function deleteEducation(int $id)
    {
        return DB::table('edu_hist')->delete($id);
    }
}