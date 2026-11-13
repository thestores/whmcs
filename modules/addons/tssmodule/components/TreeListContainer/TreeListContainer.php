<?php

namespace ModulesGarden\tssmodule\Components\TreeListContainer;

use ModulesGarden\tssmodule\Core\Components\AbstractComponent;
use ModulesGarden\tssmodule\Core\Components\Traits\AjaxTrait;
use ModulesGarden\tssmodule\Core\Components\Traits\ComponentsContainerTrait;

/**
 * Class PreBlock
 */
class TreeListContainer extends AbstractComponent
{
    use AjaxTrait;
    use ComponentsContainerTrait;

    public const COMPONENT = 'TreeListContainer';

    public function openOnActiveItems(bool $openOnActiveItems = true): self
    {
        $this->setSlot('openOnActiveItems', $openOnActiveItems);

        return $this;
    }
}
