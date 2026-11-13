<?php

namespace ModulesGarden\tssmodule\App\Http\Admin;

use ModulesGarden\tssmodule\App\UI\Admin\Home\Index\HomeContainer;
use ModulesGarden\tssmodule\App\UI\Admin\Settings\Index\SettingsContainer;
use ModulesGarden\tssmodule\Core\Contracts\Controllers\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Http\AbstractController;
use ModulesGarden\tssmodule\Core\Helper;

class Settings extends AbstractController implements AdminAreaInterface
{

    public function index()
    {
        return Helper\view()
            ->addElement(SettingsContainer::class);
    }
}
