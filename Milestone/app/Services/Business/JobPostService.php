<?php
/*
 * CST-256 Milestone Project
 * Version - 1
 * Module - Job Match
 * Module Version - 1
 * Programmer: Hiram Viezca
 * Date 7/25/2022
 * Synopsis: The JobPostService defines the
 * business logic for Job Posts
 * */
namespace App\Services\Business;

use App\Models\JobPostModel;
use App\Services\Data\JobPostDAO;

class JobPostService
{
    private $dao;

    function __construct() {
        $this->dao = new JobPostDAO();
    }

    /**
     * @return array
     */
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

    /**
     * @param $searchTerm
     * @return array
     */
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

    /**
     * @param $id
     * @return JobPostModel
     */
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