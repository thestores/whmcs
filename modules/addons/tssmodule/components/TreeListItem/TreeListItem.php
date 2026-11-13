<?php

namespace ModulesGarden\tssmodule\Components\TreeListItem;

use ModulesGarden\tssmodule\Core\Components\AbstractComponent;
use ModulesGarden\tssmodule\Core\Components\Traits\ActionOnClickTrait;
use ModulesGarden\tssmodule\Core\Components\Traits\AjaxTrait;
use ModulesGarden\tssmodule\Core\Components\Traits\ComponentsContainerTrait;
use ModulesGarden\tssmodule\Core\Components\Traits\TitleTrait;

/**
 * Class PreBlock
 */
class TreeListItem extends AbstractComponent
{
    use AjaxTrait;
    use TitleTrait;
    use ComponentsContainerTrait;
    use ActionOnClickTrait;

    public const COMPONENT = 'TreeListItem';

    public function setActive(bool $active = true): self
    {
        $this->setSlot('isActive', $active);

        return $this;
    }

    public function setOpen(bool $open = true): self
    {
        $this->setSlot('isOpen', $open);

        return $this;
    }
}
