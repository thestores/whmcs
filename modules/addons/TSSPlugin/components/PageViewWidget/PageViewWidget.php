<?php

namespace ModulesGarden\TSSPlugin\Components\PageViewWidget;

use ModulesGarden\TSSPlugin\Components\Image\Image;
use ModulesGarden\TSSPlugin\Core\Components\AbstractComponent;
use ModulesGarden\TSSPlugin\Core\Components\Traits\TitleTrait;
use ModulesGarden\TSSPlugin\Core\Components\Traits\ToolbarTrait;

class PageViewWidget extends AbstractComponent
{
    use TitleTrait;
    use ToolbarTrait;

    public const COMPONENT = 'PageViewWidget';

    public function setImage(Image $image): self
    {
        $this->setSlot('image', $image);

        return $this;
    }

    public function setDetails(AbstractComponent $details): self
    {
        $this->setSlot('details', $details);

        return $this;
    }

    public function setButtonsContainer(AbstractComponent $buttonsContainer): self
    {
        $this->setSlot('buttonsContainer', $buttonsContainer);

        return $this;
    }
}