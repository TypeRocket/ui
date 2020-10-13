<?php
namespace TR_UI\Controllers;

use TR_UI\Models\Category;
use TypeRocket\Controllers\WPTermController;

class CategoryController extends WPTermController
{
    protected $modelClass = Category::class;
}