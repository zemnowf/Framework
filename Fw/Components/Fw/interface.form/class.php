<?php

namespace Fw\Components\Fw;

use Fw\Core\Component\Base;

class InterfaceForm extends Base
{
    public function executeComponent()
    {
        $this->template->render();
    }

}