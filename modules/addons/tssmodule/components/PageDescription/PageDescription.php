<?php

namespace ModulesGarden\tssmodule\Components\PageDescription;

use ModulesGarden\tssmodule\Core\Components\AbstractComponent;
use ModulesGarden\tssmodule\Core\Components\Traits\ImageTrait;
use ModulesGarden\tssmodule\Core\Components\Traits\TitleTrait;

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
