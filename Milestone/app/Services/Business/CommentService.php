<?php
/*
 * CST-256 Milestone Project
 * Version - 1
 * Module - Affinity Groups
 * Module Version - 1
 * Programmer: Hiram Viezca
 * Date 7/25/2022
 * Synopsis: The CommentService defines the
 * business logic for Comments
 * */
namespace App\Services\Business;

use App\Models\CommentModel;
use App\Services\Data\CommentsDAO;

class CommentService
{
    private $commentsDAO;

    function __construct() {
        return $this->commentsDAO = new CommentsDAO();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findByGroupId($id)
    {
        return $this->commentsDAO->findByGroupId($id);
    }

    /**
     * @param CommentModel $comment
     * @return mixed
     */
    public function submitComment(CommentModel $comment)
    {
        return $this->commentsDAO->submitComment($comment);
    }
}