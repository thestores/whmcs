<?php

namespace ModulesGarden\TSSPlugin\Components\FileManager\Source;

use ModulesGarden\TSSPlugin\Core\Components\AbstractComponent;
use ModulesGarden\TSSPlugin\Core\Components\Actions\ReloadById;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\ActionInterface;
use ModulesGarden\TSSPlugin\Core\Support\Facades\Request;

class Directory extends Item
{
    /**
     * @var Item[]
     */
    protected array $items = [];
    protected static bool $isDir = true;
    protected static string $icon = "folder";

    /**
     * @return Item[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param Item[] $items
     */
    public function setItems(array $items): self
    {
        foreach ($items as $item)
        {
            $this->addItem($item);
        }

        return $this;
    }

    /**
     * @param Item $item
     */
    public function addItem(Item $item): void
    {
        $this->items[] = $item;
    }

    public function hasItems(): bool
    {
        return !empty($this->items);
    }

    public function getClickAction(AbstractComponent $component): ?ActionInterface
    {
        $pathElements   = Request::get('ajaxData')['pathElements'] ?: [];
        $pathElements[] = $this->getName();

        return (new ReloadById($component->getId()))
            ->withParams(['pathElements' => $pathElements]);
    }
}