<?php

namespace ModulesGarden\tssmodule\Components\PageViewWidget;

use ModulesGarden\tssmodule\Components\Image\Image;
use ModulesGarden\tssmodule\Core\Components\AbstractComponent;
use ModulesGarden\tssmodule\Core\Components\Traits\TitleTrait;
use ModulesGarden\tssmodule\Core\Components\Traits\ToolbarTrait;

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