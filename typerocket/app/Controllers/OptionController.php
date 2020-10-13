<?php
namespace TR_UI\Controllers;

use TR_UI\Models\Option;
use TypeRocket\Controllers\WPOptionController;

class OptionController extends WPOptionController
{
    protected $modelClass = Option::class;
}