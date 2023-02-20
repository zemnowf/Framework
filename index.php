<?php

require './Fw/init.php';

use Fw\Core\Application;
use Fw\Core\Route;

Route::route();

$action = $_SERVER['REQUEST_URI'];
Route::dispatch($action);