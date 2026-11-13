<?php

namespace ModulesGarden\tssmodule\Components\Tab;

use ModulesGarden\tssmodule\Core\Components\AbstractComponent;
use ModulesGarden\tssmodule\Core\Components\Traits\ComponentsContainerTrait;
use ModulesGarden\tssmodule\Core\Components\Traits\ContentTrait;
use ModulesGarden\tssmodule\Core\Components\Traits\TitleTrait;
use ModulesGarden\tssmodule\Core\Contracts\Components\ComponentContainerInterface;

/**
 * Class Tab
 */
class Tab extends AbstractComponent implements ComponentContainerInterface
{
    use ComponentsContainerTrait;
    use TitleTrait;
    use ContentTrait;

    public const COMPONENT = 'Tab';

    public function setActive(bool $active = true):self
    {
        $this->setSlot('isActive', $active);

        return $this;
    }
}
