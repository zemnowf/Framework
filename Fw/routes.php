<?php

use Fw\Core\Route;

Route::setRoute('/', function () {
    include "public/homepage.php";
});

Route::setRoute('/news', function () {
    include "public/news.php";
});

Route::setRoute('/404', function () {
    include "public/404.php";
});