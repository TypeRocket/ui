<?php
namespace TR_UI\Models;

use TypeRocket\Models\WPTerm;

class Tag extends WPTerm
{
    protected $taxonomy = 'post_tag';
}