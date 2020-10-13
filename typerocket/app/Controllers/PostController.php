<?php
namespace TR_UI\Controllers;

use TR_UI\Models\Post;
use TypeRocket\Controllers\WPPostController;

class PostController extends WPPostController
{
    protected $modelClass = Post::class;
}
