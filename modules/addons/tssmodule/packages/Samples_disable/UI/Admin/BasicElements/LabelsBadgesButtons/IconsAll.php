<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\BasicElements\LabelsBadgesButtons;

use ModulesGarden\tssmodule\Components\Container\Container;
use ModulesGarden\tssmodule\Components\IconButton\IconButton;
use ModulesGarden\tssmodule\Components\Widget\Widget;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\ModuleConstants;


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
