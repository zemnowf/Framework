<?php

require './Fw/init.php';

use Fw\Core\Application;
use Fw\Core\InstanceContainer;


$application = InstanceContainer::get(Application::class);
$application->getPage()->addCss('public/assets/css/bootstrap.min.css');
$application->getPage()->addJs('publoc/assets/js/bootstrap.bundle.min.js');
$application->getPage()->setProperty('title', 'Framework');
$application->header();
$application->includeComponent(
    'Fw:element.list',
    'default',
    [
        "sort" => "id",
        "limit" => 10,
        "show_title" => "N"
    ]
);
$application->footer();