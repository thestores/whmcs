<?php

namespace ModulesGarden\tssmodule\Components\TabsWidget;

use ModulesGarden\tssmodule\Components\Tab\Tab;
use ModulesGarden\tssmodule\Components\Widget\Widget;
use ModulesGarden\tssmodule\Core\Contracts\Components\ComponentInterface;

/**
 * Class TabsWidget
 */
class TabsWidget extends Widget
{
    public const COMPONENT = 'TabsWidget';

    /**
     * @param ComponentInterface $component
     */
    public function addTab(Tab $component)
    {
        $this->addComponent('tabs', $component);
    }

    public function disableSwiper(bool $disableSwiper = true):self
    {
        $this->setSlot('disableSwiper', $disableSwiper);

        return $this;
    }
}
