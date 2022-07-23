<?php

namespace App\Services\Business;

use App\Models\JobPostModel;
use App\Services\Data\JobPostDAO;

class JobPostService
{
    private $dao;

    function __construct() {
        $this->dao = new JobPostDAO();
    }
    public function findAll() {
        $records = $this->dao->findAll();
        $jobposts = [];
        foreach($records as $record) {
            $post = new JobPostModel(
                $record->id,
                $record->name,
                $record->description
            );
            $jobposts[] = $post;
        }
        return $jobposts;
    }

    public function search($searchTerm)
    {
        $records = $this->dao->search($searchTerm);
        $jobposts = [];
        foreach($records as $record) {
            $post = new JobPostModel(
                $record->id,
                $record->name,
                $record->description
            );
            $jobposts[] = $post;
        }
        return $jobposts;
    }

    public function findById($id)
    {
        $record = $this->dao->findById($id);
        return new JobPostModel(
          $record->id,
          $record->name,
          $record->description
        );
    }
}