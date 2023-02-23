<?php

require './Fw/init.php';

use Fw\Core\Application;
use Fw\Core\InstanceContainer;


$application = InstanceContainer::get(Application::class);
$application->getPage()->addCss('public/assets/css/main.css');
$application->getPage()->setProperty('title', 'Framework');
$application->header();
$application->footer();