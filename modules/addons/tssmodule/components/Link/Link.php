<?php

namespace ModulesGarden\tssmodule\Components\Link;

use ModulesGarden\tssmodule\Core\Components\AbstractComponent;
use ModulesGarden\tssmodule\Core\Components\Traits\UrlTrait;
use ModulesGarden\tssmodule\Core\Contracts\Components\ComponentInterface;

class Link extends AbstractComponent
{
    use UrlTrait;

    public const COMPONENT = 'Link';

    public function setTitle(string|ComponentInterface $title): self
    {
        $this->setSlot('title', $title);

        return $this;
    }
}