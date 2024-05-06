<?php

use app\Models\User;

require "vendor/autoload.php";


$request = ["email" => "damrdasi@gmail.com", "password" => "supersecret"];

$userController = new \app\Controllers\UserController();

$userController->register($request);