<?php

namespace Fw\Core;

class Page
{
    const FW_MACRO_JS = "FW_MACRO_JS";
    const FW_MACRO_CSS = "FW_MACRO_CSS";
    const FW_MACRO_STRING = "FW_MACRO_STRING";

    private array $scripts = [];
    private array $links = [];
    private array $strings = [];
    private array $properties = [];

    public function addJs(string $src)
    {
        if (!isset($this->scripts[$src])) {
            $this->scripts[] = $src;
        }
    }

    public function addCss(string $link)
    {
        if (!isset($this->links[$link])) {
            $this->links[] = $link;
        }
    }

    public function addString(string $string)
    {
        $this->strings[] = $string;
    }

    public function setProperty(string $id, $value)
    {
        $this->properties["FW_PAGE_PROPERTY_{$id}"] = $value;
    }

    public function getProperty(string $id)
    {
        return $this->properties["FW_PAGE_PROPERTY_{$id}"];
    }

    public function showProperty(string $id)
    {
        if (!is_null($this->getProperty($id))) {
            echo $this->getProperty($id);
        } else echo "";
    }

    public function getAllReplaces(): array
    {
        $allReplaces[self::FW_MACRO_JS] = implode(array_map(
            fn($src) => "<script src=\"{$src}\"></script>", $this->scripts));

        $allReplaces[self::FW_MACRO_CSS] = implode(array_map(
            fn($link) => "<link href=\"{$link}\" rel=\"stylesheet\">", $this->links));

        $allReplaces[self::FW_MACRO_STRING] = implode(array_map(
            fn($str) => $str, $this->strings));

        return $allReplaces;
    }

    public function showHead()
    {
        echo self::FW_MACRO_JS;
        echo self::FW_MACRO_STRING;
        echo self::FW_MACRO_CSS;
    }
}