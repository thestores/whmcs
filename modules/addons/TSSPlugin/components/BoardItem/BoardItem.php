<?php

namespace ModulesGarden\TSSPlugin\Components\BoardItem;

use ModulesGarden\TSSPlugin\Components\Container\Container;
use ModulesGarden\TSSPlugin\Core\Components\Traits\BorderTrait;
use ModulesGarden\TSSPlugin\Core\Components\Traits\TextTrait;
use ModulesGarden\TSSPlugin\Core\Components\Traits\TitleTrait;
use ModulesGarden\TSSPlugin\Core\Components\Traits\ToolbarTrait;

class BoardItem extends Container
{
    use TitleTrait;
    use TextTrait;
    use ToolbarTrait;
    use BorderTrait;

    public const COMPONENT = 'BoardItem';

    /**
     * @param string $subTitle
     * @return self
     **/
    public function setSubTitle(string $subTitle): self
    {
        $this->setSlot('subTitle', $subTitle);

        return $this;
    }

    public function addTopElement($element): self
    {
        $this->addTopComponent('elements', $element);

        return $this;
    }

    protected function addTopComponent($type, $element): self
    {
        $this->pushToSlot('topElements.' . $type, $element);

        return $this;
    }

    protected function topElementsSlotBuilder()
    {
        return $this->getSlot('topElements');
    }

}
