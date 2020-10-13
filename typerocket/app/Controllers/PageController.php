<?php
namespace TR_UI\Controllers;

use TR_UI\Models\Page;
use TypeRocket\Controllers\WPPostController;

class PageController extends WPPostController
{
    protected $modelClass = Page::class;
}
