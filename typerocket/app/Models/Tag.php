<?php
namespace TypeRocketUIPlugin\Models;

use TypeRocket\Models\WPTerm;

class Tag extends WPTerm
{
    public const TAXONOMY = 'post_tag';
    protected $closed = true;
}