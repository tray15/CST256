<?php

namespace App\Services\Data;

use Illuminate\Support\Facades\DB;

class JobPostDAO
{
    public function findAll() {
        return DB::table('job_post')->get();
    }

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

    public function findById($id)
    {
        return DB::table('job_post')->where('id', $id)->first();
    }
}