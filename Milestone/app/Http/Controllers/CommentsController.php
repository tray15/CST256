<?php

namespace App\Http\Controllers;

use App\Models\CommentModel;
use App\Services\Business\CommentService;
use App\Services\Utility\MyLogger;
use Illuminate\Http\Request;
use PhpParser\Comment;

class CommentsController extends Controller
{
    private $commentService;
    private $logger;

    function __construct() {
        $this->commentService = new CommentService();
        $this->logger = new MyLogger();
    }

    public function submitComment(Request $request): \Illuminate\Http\RedirectResponse
    {
        $this->logger->info('Entering CommentsController.submitComment()');
        $text = $request->comment;
        $created_at = now();
        $profile_id = session('profileid');
        $group_id = $request->id;

        $comment = new CommentModel('', $text, $created_at, $profile_id, $group_id);

        $id = $this->commentService->submitComment($comment);
        $this->logger->info('Exiting CommentsController.submitComment()');
        return redirect(route('displayGroupPage', $group_id));
    }
}