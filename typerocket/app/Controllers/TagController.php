<?php
namespace TypeRocketUIPlugin\Controllers;

use TypeRocketUIPlugin\Models\Tag;
use TypeRocket\Controllers\WPTermController;

class TagController extends WPTermController
{
    protected $modelClass = Tag::class;
}