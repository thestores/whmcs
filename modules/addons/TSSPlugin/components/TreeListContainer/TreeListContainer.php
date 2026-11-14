<?php

namespace ModulesGarden\TSSPlugin\Components\TreeListContainer;

use ModulesGarden\TSSPlugin\Core\Components\AbstractComponent;
use ModulesGarden\TSSPlugin\Core\Components\Traits\AjaxTrait;
use ModulesGarden\TSSPlugin\Core\Components\Traits\ComponentsContainerTrait;

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
