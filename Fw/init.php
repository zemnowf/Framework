<?php
session_start();

const FW_CORE_CONNECTION = true;
const TEMPLATES = __DIR__ . '/templates/';

spl_autoload_register(function (string $class) {

    $file = __DIR__ . '/' . str_replace("Fw\\", '/', $class) . '.php';

    if (file_exists($file)) {
        require $file;
    }

});