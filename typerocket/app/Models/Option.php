<?php
namespace TypeRocketUIPlugin\Models;

use TypeRocket\Models\WPOption;

class Option extends WPOption
{
    protected $fillable = [
        \TypeRocketUIPlugin::OPTION
    ];
}