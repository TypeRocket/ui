<?php
namespace TypeRocketUIPlugin\Models;

use TypeRocket\Models\WPUser;

class User extends WPUser
{
    protected $closed = true;
}