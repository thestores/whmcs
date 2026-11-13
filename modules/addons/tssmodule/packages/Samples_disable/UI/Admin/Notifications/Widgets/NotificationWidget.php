<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\Notifications\Widgets;

use ModulesGarden\tssmodule\Components\Container\ContainerRow;
use ModulesGarden\tssmodule\Components\Toolbar\Toolbar;
use ModulesGarden\tssmodule\Components\Widget\Widget;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\Notifications\Components\Notifications;

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