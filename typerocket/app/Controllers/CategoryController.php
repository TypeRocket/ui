<?php
namespace TypeRocketUIPlugin\Controllers;

use TypeRocketUIPlugin\Models\Category;
use TypeRocket\Controllers\WPTermController;

class CategoryController extends WPTermController
{
    protected $modelClass = Category::class;
}