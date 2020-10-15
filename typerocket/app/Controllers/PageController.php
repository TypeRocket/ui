<?php
namespace TypeRocketUIPlugin\Controllers;

use TypeRocketUIPlugin\Models\Page;
use TypeRocket\Controllers\WPPostController;

class PageController extends WPPostController
{
    protected $modelClass = Page::class;
}
