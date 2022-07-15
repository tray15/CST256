<?php

namespace App\Services\Data;

use App\Models\CommentModel;
use Illuminate\Support\Facades\DB;

class CommentsDAO
{
    public function findByGroupId($id){
        return DB::table('comments')->where('comments.group_id', $id)
            ->join('profiles', 'profiles.id', '=', 'comments.profile_id')
            ->select('profiles.firstname', 'profiles.lastname', 'comments.id', 'comments.text', 'comments.created_at', 'comments.profile_id', 'comments.group_id')
            ->get();
    }

    public function submitComment(CommentModel $comment)
    {
        return DB::table('comments')->insertGetId([
            'text'=>$comment->getText(),
            'created_at'=>$comment->getCreatedAt(),
            'profile_id'=>$comment->getProfileId(),
            'group_Id'=>$comment->getGroupId()
        ]);
    }
}