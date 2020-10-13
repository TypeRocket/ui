<?php
namespace TR_UI\Controllers;

use TR_UI\Models\Comment;
use TypeRocket\Controllers\WPCommentController;

class CommentController extends WPCommentController
{
    protected $modelClass = Comment::class;
}