<?php

namespace ModulesGarden\TSSPlugin\Core\Components\Traits;

use ModulesGarden\TSSPlugin\Core\Components\Enums\LayoutProps;

trait LayoutPropsTrait
{

    public function setLayoutProp(LayoutProps $prop):self
    {
        $this->appendCss($prop->value);

        return $this;
    }
}