<?php

namespace Fw\Core\Component;

use Fw\Core\Application;
use Fw\Core\InstanceContainer;

class Template
{
    private string $__path;
    private string $__relativePath;
    private string $templateId;
    private Base $component;
    private Application $application;

    public function __construct($templateId, Base $component)
    {
        $this->templateId = $templateId;
        $this->component = $component;
        $this->__path = $component->__path . '/templates/' . $templateId . '/';
        $this->__relativePath = './assets/' . str_replace(':', '/', $this->component->id) . '/';
        $this->application = InstanceContainer::get(Application::class);
        $this->map = [];
    }

    public function render(string $page = "template")
    {
        $resultModifier = $this->__path . 'result_modifier.php';
        $componentEpilogue = $this->__path . 'component_epilogue.php';
        $page = $this->__path . $page . '.php';
        $script = $this->__path . 'script.js';
        $style = $this->__path . 'style.css';

        include $resultModifier;
        include $page;
        include $componentEpilogue;
    }

}