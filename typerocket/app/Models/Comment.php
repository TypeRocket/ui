<?php
namespace TypeRocketUIPlugin\Models;

use TypeRocket\Models\WPComment;

class Comment extends WPComment
{
    protected $closed = true;
}