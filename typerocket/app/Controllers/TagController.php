<?php
namespace TR_UI\Controllers;

use TR_UI\Models\Tag;
use TypeRocket\Controllers\WPTermController;

class TagController extends WPTermController
{
    protected $modelClass = Tag::class;
}