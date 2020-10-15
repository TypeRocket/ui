<?php
namespace TypeRocketUIPlugin\Models;

use TypeRocket\Models\WPTerm;

class Tag extends WPTerm
{
    protected $taxonomy = 'post_tag';
    protected $closed = true;
}