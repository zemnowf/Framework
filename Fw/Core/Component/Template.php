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
    }

    public function render(string $page = "template")
    {
        $resultModifier = $this->__path . 'result_modifier.php';
        $componentEpilogue = $this->__path . 'component_epilogue.php';
        $page = $this->__path . $page . '.php';
        $style = explode('Framework\\', ($this->__path . 'style.css'))[1];
        $script = explode('Framework\\', ($this->__path . 'script.js'))[1];

        if (file_exists($resultModifier)) {
            include $resultModifier;
        }
        if (file_exists($page)) {
            include $page;
        }
        if (file_exists($componentEpilogue)) {
            include $componentEpilogue;
        }
        if (file_exists($style)) {
            $this->application->getPage()->addCss($style);
        }
        if (file_exists($script)) {
            $this->application->getPage()->addJs($script);
        }

    }

}