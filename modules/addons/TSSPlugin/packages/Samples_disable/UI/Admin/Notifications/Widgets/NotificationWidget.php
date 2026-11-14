<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\Notifications\Widgets;

use ModulesGarden\TSSPlugin\Components\Container\ContainerRow;
use ModulesGarden\TSSPlugin\Components\Toolbar\Toolbar;
use ModulesGarden\TSSPlugin\Components\Widget\Widget;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\Notifications\Components\Notifications;

class NotificationWidget extends Widget implements AjaxComponentInterface, AdminAreaInterface
{
    public function loadHtml(): void
    {
        $notificationDropdown = new Notifications();

        $bar = new Toolbar();
        $bar->addElement(new ContainerRow());
        $bar->addElement($notificationDropdown);

        $this->addElement($bar);
    }
}