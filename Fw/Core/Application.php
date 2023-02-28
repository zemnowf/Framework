<?php

namespace Fw\Core;

use Fw\Core\Type\Request;
use Fw\Core\Type\Server;
use Fw\Core\Type\Session;

class Application
{
    const TEMPLATES = 'Fw/templates/';
    const TEMPLATE = 'template/id';
    const HEADER = '/header.php';
    const FOOTER = '/footer.php';

    private $pager = null;
    private $template = null;
    private $buffer = false;

    private $request;
    private $server;
    private $session;
    private array $components;

    public function __construct()
    {
        Route::route();
        Config::configure();
        $this->pager = InstanceContainer::get(Page::class);
        $this->request = InstanceContainer::get(Request::class);
        $this->server = InstanceContainer::get(Server::class);
        $this->session = InstanceContainer::get(Session::class);
    }

    public function getPage()
    {
        return $this->pager;
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function setRequest($request): void
    {
        $this->request = $request;
    }

    public function getServer()
    {
        return $this->server;
    }

    /**
     * @param mixed $server
     */
    public function setServer($server): void
    {
        $this->server = $server;
    }

    public function getSession()
    {
        return $this->session;
    }

    public function setSession($session): void
    {
        $this->session = $session;
    }

    public function header()
    {
        $this->startBuffer();
        include TEMPLATES . Config::get(self::TEMPLATE) . self::HEADER;
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
        $replaces = $this->pager->getAllReplaces();
        return str_replace(array_keys($replaces), $replaces, $content);
    }

    public function includeComponent(string $component, string $template, array $params)
    {

        try {
            $componentPath = COMPONENTS_ROOT . str_replace(':', '/', $component);
            if (!empty($this->components[$component])) {
                $componentClass = $this->components[$component];
            } else {
                $componentClassPath = $componentPath . '/class.php';
                include $componentClassPath;

                [$componentTitle, $className] = explode(':', $component);

                $classNameElements = explode('.', $className);

                foreach ($classNameElements as $element) {
                    $element = ucfirst($element);
                }

                $className = implode('', $classNameElements);

                $componentClass = 'Fw\Components\\' . $componentTitle . '\\' . $className;
                $this->components[$component] = $componentClass;
            }

            $componentInstance = new $componentClass($component, $template, $params, $componentPath);

            $componentInstance->executeComponent();

        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

}