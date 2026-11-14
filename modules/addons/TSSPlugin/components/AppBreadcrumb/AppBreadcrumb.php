<?php

namespace ModulesGarden\TSSPlugin\Components\AppBreadcrumb;

use ModulesGarden\TSSPlugin\Core\Components\AbstractComponent;
use ModulesGarden\TSSPlugin\Core\UI\Breadcrumbs\Item;

/**
 * Class Form
 */
class AppBreadcrumb extends AbstractComponent
{
    public const COMPONENT = 'AppBreadcrumb';
    protected $items = [];

    public function __construct()
    {
        parent::__construct();
        $this->setSlot('items');
        // the trail starts with the edition's name, like the dashboard heading
        $this->setSlot('module', \ModulesGarden\TSSPlugin\App\Libs\Edition::name());
    }

    /**
     * @param string $name
     * @param string $url
     * @param bool $isActive
     * @return $this
     */
    public function addItem(Item $item): self
    {
        $this->items[] = $item;

        return $this;
    }

    public function setItems(array $items): self
    {
        $this->items = $items;

        return $this;
    }
}
