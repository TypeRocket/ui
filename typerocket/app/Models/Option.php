<?php
namespace TypeRocketUIPlugin\Models;

use TypeRocket\Extensions\TypeRocketUI;
use TypeRocket\Models\WPOption;

class Option extends WPOption
{
    protected $fillable = [
        TypeRocketUI::OPTION
    ];
}