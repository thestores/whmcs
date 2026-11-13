<?php

namespace ModulesGarden\tssmodule\Components\SidebarItem;

use ModulesGarden\tssmodule\App\Libs\Icons;
use ModulesGarden\tssmodule\Core\Components\AbstractComponent;
use ModulesGarden\tssmodule\Core\Components\Traits\ComponentsContainerTrait;
use ModulesGarden\tssmodule\Core\Components\Traits\CssContainerTrait;
use ModulesGarden\tssmodule\Core\Components\Traits\UrlTrait;
use ModulesGarden\tssmodule\Core\Components\Traits\TitleTrait;
use ModulesGarden\tssmodule\Core\Contracts\Components\ComponentContainerInterface;

class SidebarItem extends AbstractComponent implements ComponentContainerInterface
{
    use CssContainerTrait;
    use ComponentsContainerTrait;
    use TitleTrait;
    use UrlTrait;

    public const COMPONENT = 'SidebarItem';

    public function __construct(string $title = "", string $url = "")
    {
        parent::__construct();
        $this->setTitle($title);
        $this->setUrl($url);
    }

    /**
     * Material Design Icons name without the prefix (e.g. "key-variant")
     */
    public function setIcon(string $icon): self
    {
        // inline SVG; the class only for a name that has no SVG yet
        $svg = Icons::svg($icon);
        $this->setSlot('icon', $svg !== '' ? $svg : 'mdi mdi-' . $icon);

        return $this;
    }

    public function setActive(bool $active): self
    {
        $this->setSlot('active', $active);

        return $this;
    }

    public function getUrl():string
    {
        return $this->getSlot('url');
    }

    public function setClass(string $class)
    {
        $this->setSlot('class', $class);
    }

}