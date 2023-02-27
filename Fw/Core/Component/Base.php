<?php

namespace Fw\Core\Component;

abstract class Base
{
    public array $result;
    public string $id;
    public array $params;
    public Template $template;
    public ?string $__path = null;
    public array $inputMap;
    public array $selectMap;
    public array $textAreaMap;

    public function __construct(string $id, string $templateId, array $params, $__path)
    {
        $this->result = array();
        $this->id = $id;
        $this->params = $params;
        $this->__path = $__path;
        $this->template = new Template($templateId, $this);
        $this->inputMap = [];
    }

    abstract public function executeComponent();

    public function getInputMap(): array
    {
        return $this->inputMap;
    }

    public function setInputMap(array $inputMap): void
    {
        $this->inputMap = $inputMap;
    }

    public function getSelectMap(): array
    {
        return $this->selectMap;
    }

    public function setSelectMap(array $selectMap): void
    {
        $this->selectMap = $selectMap;
    }

    public function getTextAreaMap(): array
    {
        return $this->textAreaMap;
    }

    public function setTextAreaMap(array $textAreaMap): void
    {
        $this->textAreaMap = $textAreaMap;
    }



}