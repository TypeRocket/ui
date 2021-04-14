<?php
namespace TypeRocketUIPlugin\Models;

use TypeRocket\Models\WPPost;

class Page extends WPPost
{
    public const POST_TYPE = 'page';
    protected $closed = true;
}
