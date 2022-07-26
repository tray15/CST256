<?php
/*
 * CST-256 Milestone Project
 * Version - 1
 * Module - Job Match
 * Module Version - 1
 * Programmer: Hiram Viezca
 * Date 7/25/2022
 * Synopsis: The JohPostDAO handles the
 * database interaction for Job Posts
 * */
namespace App\Services\Data;

use Illuminate\Support\Facades\DB;

class JobPostDAO
{
    /**
     * @return mixed
     */
    public function findAll() {
        return DB::table('job_post')->get();
    }

    /**
     * @param $searchTerm
     * @return mixed
     */
    public function search($searchTerm)
    {
        if($searchTerm == null)
        {
            return DB::table('job_post')->get();
        }
        else{
            return DB::table('job_post')->where('name', 'like', '%' . $searchTerm . '%')
                                        ->orwhere('description', 'like', '%' . $searchTerm . '%')->get();
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return DB::table('job_post')->where('id', $id)->first();
    }
}