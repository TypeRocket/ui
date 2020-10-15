<?php
namespace TypeRocketUIPlugin\Models;

use TypeRocket\Models\WPTerm;

class Category extends WPTerm
{
    protected $taxonomy = 'category';
    protected $closed = true;
}
