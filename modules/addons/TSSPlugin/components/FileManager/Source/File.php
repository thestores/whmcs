<?php

namespace ModulesGarden\TSSPlugin\Components\FileManager\Source;

use ModulesGarden\TSSPlugin\Core\Components\AbstractComponent;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\ActionInterface;

class File extends Item
{
    protected static bool $isDir = false;
    protected static string $icon = "file-document";

    public function getClickAction(AbstractComponent $component): ?ActionInterface
    {
        return null;
    }
}