<?php

namespace Fw\Core;

class Application
{
    const TEMPLATES = 'Fw/templates/';
    const TEMPLATE = 'template/id';
    const HEADER = '/header.php';
    const FOOTER = '/footer.php';

    private $pager = null;
    private $template = null;
    private $buffer = false;

    public function __construct()
    {
        Route::route();
        Config::configure();
        $this->header();
        $this->footer();
    }

    public function header()
    {
        $this->startBuffer();

        //fix
        include self::TEMPLATES . Config::get(self::TEMPLATE) . self::HEADER;
    }

    public function footer()
    {
        include self::TEMPLATES . Config::get(self::TEMPLATE) . self::FOOTER;
        echo $this->endBuffer();
    }

    public function startBuffer()
    {
        ob_start();
        $this->buffer = true;
    }

    public function restartBuffer()
    {
        if ($this->buffer) {
            ob_clean();
        }
        $this->startBuffer();
    }

    public function endBuffer()
    {
        $content = ob_get_clean();
        $this->buffer = false;

        //fix
        return $content;
    }

}