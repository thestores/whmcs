<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\BasicElements\LabelsBadgesButtons;

use ModulesGarden\TSSPlugin\Components\Container\Container;
use ModulesGarden\TSSPlugin\Components\IconButton\IconButton;
use ModulesGarden\TSSPlugin\Components\Widget\Widget;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\ModuleConstants;


class IconsAll extends Widget implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->setTitle('All Icons');

        $bar = new Container();

        preg_match_all('/\.mdi-([a-z]+)::before/', file_get_contents(ModuleConstants::getAssetsDir('assets', 'css', 'materialdesignicons.min.css')), $matches);

        foreach (array_unique($matches[1]) as $icon)
        {
            $bar->addElement((new IconButton())->setIcon($icon)->setTitle('lu-mdi mdi mdi-' . $icon));
        }

        $this->addElement($bar);
    }

}
