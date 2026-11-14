<?php

namespace ModulesGarden\TSSPlugin\App\Http\Admin;

use ModulesGarden\TSSPlugin\App\UI\Admin\AutomationQueue\Index\AutomationQueueContainer;
use ModulesGarden\TSSPlugin\Core\Contracts\Controllers\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Http\AbstractController;
use ModulesGarden\TSSPlugin\Core\Helper;

class AutomationQueue extends AbstractController implements AdminAreaInterface
{

    public function index()
    {
        return Helper\view()
            ->addElement(AutomationQueueContainer::class);
    }
}
