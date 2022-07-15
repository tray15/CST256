<?php

namespace App\Http\Controllers;

use App\Models\CommentModel;
use App\Services\Business\CommentService;
use Illuminate\Http\Request;
use PhpParser\Comment;

class CommentsController extends Controller
{
    private $commentService;

    function __construct() {
        $this->commentService = new CommentService();
    }

    public function submitComment(Request $request): \Illuminate\Http\RedirectResponse
    {
        $text = $request->comment;
        $created_at = now();
        $profile_id = session('profileid');
        $group_id = $request->id;

        $comment = new CommentModel('', $text, $created_at, $profile_id, $group_id);

        $id = $this->commentService->submitComment($comment);

        return redirect(route('displayGroupPage', $group_id));
    }
}