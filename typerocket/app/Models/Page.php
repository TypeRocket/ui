<?php
namespace TypeRocketUIPlugin\Models;

use TypeRocket\Models\WPPost;

class Page extends WPPost
{
    protected $postType = 'page';
    protected $closed = true;
}
