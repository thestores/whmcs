<?php

namespace ModulesGarden\TSSPlugin\Components\Tab;

use ModulesGarden\TSSPlugin\Core\Components\AbstractComponent;
use ModulesGarden\TSSPlugin\Core\Components\Traits\ComponentsContainerTrait;
use ModulesGarden\TSSPlugin\Core\Components\Traits\ContentTrait;
use ModulesGarden\TSSPlugin\Core\Components\Traits\TitleTrait;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\ComponentContainerInterface;

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
