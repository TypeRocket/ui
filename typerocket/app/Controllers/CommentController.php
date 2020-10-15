<?php
namespace TypeRocketUIPlugin\Controllers;

use TypeRocketUIPlugin\Models\Comment;
use TypeRocket\Controllers\WPCommentController;

class CommentController extends WPCommentController
{
    protected $modelClass = Comment::class;
}