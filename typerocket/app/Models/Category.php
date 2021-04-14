<?php
namespace TypeRocketUIPlugin\Models;

use TypeRocket\Models\WPTerm;

class Category extends WPTerm
{
    public const TAXONOMY = 'category';
    protected $closed = true;
}
