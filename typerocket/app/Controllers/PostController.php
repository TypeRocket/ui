<?php
namespace TypeRocketUIPlugin\Controllers;

use TypeRocketUIPlugin\Models\Post;
use TypeRocket\Controllers\WPPostController;

class PostController extends WPPostController
{
    protected $modelClass = Post::class;
}
