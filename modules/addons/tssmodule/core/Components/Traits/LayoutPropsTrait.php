<?php

namespace ModulesGarden\tssmodule\Core\Components\Traits;

use ModulesGarden\tssmodule\Core\Components\Enums\LayoutProps;

trait LayoutPropsTrait
{

    public function setLayoutProp(LayoutProps $prop):self
    {
        $this->appendCss($prop->value);

        return $this;
    }
}