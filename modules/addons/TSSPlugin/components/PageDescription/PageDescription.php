<?php

namespace ModulesGarden\TSSPlugin\Components\PageDescription;

use ModulesGarden\TSSPlugin\Core\Components\AbstractComponent;
use ModulesGarden\TSSPlugin\Core\Components\Traits\ImageTrait;
use ModulesGarden\TSSPlugin\Core\Components\Traits\TitleTrait;

/**
 * Class Form
 */
class PageDescription extends AbstractComponent
{
    use ImageTrait;
    use TitleTrait;

    public const COMPONENT = 'PageDescription';

    public function setContent(string $content): self
    {
        $this->setSlot('content', $content);

        return $this;
    }
}
