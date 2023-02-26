<?php

namespace Fw\Core\Component;

abstract class Base
{
    public array $result;
    public string $id;
    public array $params;
    public Template $template;
    public ?string $__path = null;

    public function __construct(string $id, string $templateId, array $params, $__path)
    {
        $this->result = array();
        $this->id = $id;
        $this->params = $params;
        $this->template = new Template($templateId, $this);
        $this->__path = $__path;
    }

    abstract public function executeComponent();

}