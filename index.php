<?php

require './Fw/init.php';

use Fw\Core\Application;
use Fw\Core\Route;
use Fw\Core\Config;

$application = Application::getInstance();

$action = $_SERVER['REQUEST_URI'];
Route::dispatch($action);

echo "<br>";
//test
echo Config::get("db/login");