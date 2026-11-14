<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\ComplexElements\SubPages\ContainerReload;

use ModulesGarden\TSSPlugin\Components\Alert\AlertInfo;
use ModulesGarden\TSSPlugin\Components\IconButton\IconButton;
use ModulesGarden\TSSPlugin\Components\Widget\Widget;
use ModulesGarden\TSSPlugin\Core\Components\Actions\Reload;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;

class Container extends \ModulesGarden\TSSPlugin\Components\Container\Container implements AdminAreaInterface
{
    /**
     * @return void
     */
    public function loadHtml(): void
    {
        $shouldShow = true;
        //loadHtml method is also called in Ajax so there is no need to implement separated method in this case
        if ($shouldShow)
        {
            $widget = new Widget();
            $widget->setTitle('Close me!');

            $button = new IconButton();
            $button->onClick(new Reload($this));
            $button->setIcon('refresh');
            $widget->addToToolbar($button);

            $alert = new AlertInfo();
            $alert->setText('Click icon in the toolbar if you want to hide this section');
            $widget->addElement($alert);

            $this->addElement($widget);
        }
    }

    public function loadData(): void
    {
        $this->clearElements();
    }
}