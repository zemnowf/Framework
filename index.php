<?php

require './Fw/init.php';

use Fw\Core\Application;
use Fw\Core\Route;
use Fw\Core\Config;

Route::route();

$action = $_SERVER['REQUEST_URI'];
Route::dispatch($action);

//test
echo Config::get("db/login");