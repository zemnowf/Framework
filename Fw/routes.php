<?php

use Fw\Core\Route;

Route::setRoute('/', function () {
    include "public/homepage.php";
});

Route::setRoute('/news', function () {
    include "public/news.php";
});