<?php

namespace Fw\Components\Fw;

use Fw\Core\Component\Base;

class ElementList extends Base
{
    public function executeComponent()
    {
        echo "<pre>";
        var_dump($this->params);
    }


}