<?php

namespace ModulesGarden\TSSPlugin\App\Http\Admin;

use ModulesGarden\TSSPlugin\App\UI\Admin\Home\Index\HomeContainer;
use ModulesGarden\TSSPlugin\App\UI\Admin\Settings\Index\SettingsContainer;
use ModulesGarden\TSSPlugin\Core\Contracts\Controllers\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Http\AbstractController;
use ModulesGarden\TSSPlugin\Core\Helper;

class Settings extends AbstractController implements AdminAreaInterface
{

    public function index()
    {
        return Helper\view()
            ->addElement(SettingsContainer::class);
    }
}
