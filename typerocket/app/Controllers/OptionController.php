<?php
namespace TypeRocketUIPlugin\Controllers;

use TypeRocketUIPlugin\Models\Option;
use TypeRocket\Controllers\WPOptionController;

class OptionController extends WPOptionController
{
    protected $modelClass = Option::class;
}