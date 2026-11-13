<?php

namespace ModulesGarden\tssmodule\Components\News;

use ModulesGarden\tssmodule\Core\Components\AbstractComponent;
use ModulesGarden\tssmodule\Core\Components\Traits\ComponentsContainerTrait;

class News extends AbstractComponent
{
    use ComponentsContainerTrait;

    public const COMPONENT = 'News';

    public function addItem(NewsItem $newsItem) :self
    {
        $this->addElement($newsItem->toArray());

        return $this;
    }
}
