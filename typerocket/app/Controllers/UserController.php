<?php
namespace TR_UI\Controllers;

use TR_UI\Models\User;
use TypeRocket\Controllers\WPUserController;

class UserController extends WPUserController
{
    protected $modelClass = User::class;
}