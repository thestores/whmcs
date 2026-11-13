<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\TicketReplies;

use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\TicketReplies\Widgets\TicketRepliesWidget;

class Container extends \ModulesGarden\tssmodule\Components\Container\Container implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new TicketRepliesWidget());
    }
}