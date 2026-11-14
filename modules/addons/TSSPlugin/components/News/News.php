<?php

namespace ModulesGarden\TSSPlugin\Components\News;

use ModulesGarden\TSSPlugin\Core\Components\AbstractComponent;
use ModulesGarden\TSSPlugin\Core\Components\Traits\ComponentsContainerTrait;

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
