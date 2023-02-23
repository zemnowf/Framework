<?php

use Fw\Core\Application;
use Fw\Core\InstanceContainer;
use Fw\Core\Route;

$application = InstanceContainer::get(Application::class);

?>

    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <?= $application->getPage()->showHead(); ?>
        <title><?= $application->getPage()->showProperty('title'); ?>></title>
    </head>
    <body>
    <header><p>Header</p></header>
    <main>

<?php
$action = $_SERVER['REQUEST_URI'];
Route::dispatch($action);