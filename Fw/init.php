<?php
session_start();

spl_autoload_register(function (string $class) {

    $file = __DIR__ . '/' . str_replace("Fw\\", '/', $class) . '.php';

    if (file_exists($file)) {
        require $file;
    }

});