<?php

namespace App\Services\Business;

use App\Models\CommentModel;
use App\Services\Data\CommentsDAO;

class CommentService
{
    private $commentsDAO;

    function __construct() {
        return $this->commentsDAO = new CommentsDAO();
    }

    public function findByGroupId($id)
    {
        return $this->commentsDAO->findByGroupId($id);
//        dd($records);
//        $commentsList = [];
//
//        foreach ($records as $record) {
//            $comment = new CommentModel(
//                $record->id,
//                $record->text,
//                $record->created_at,
//                $record->profile_id,
//                $record->group_id
//            );
//            $commentsList[] = $comment;
//        }
//        return $commentsList;
    }

    public function submitComment(CommentModel $comment)
    {
        return $this->commentsDAO->submitComment($comment);
    }
}