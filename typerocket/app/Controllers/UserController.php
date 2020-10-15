<?php
namespace TypeRocketUIPlugin\Controllers;

use TypeRocketUIPlugin\Models\User;
use TypeRocket\Controllers\WPUserController;

class UserController extends WPUserController
{
    protected $modelClass = User::class;
}