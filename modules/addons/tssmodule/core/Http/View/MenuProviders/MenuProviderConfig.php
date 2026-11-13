<?php

namespace ModulesGarden\tssmodule\Core\Http\View\MenuProviders;

use ModulesGarden\tssmodule\Core\FileReader\Reader;
use ModulesGarden\tssmodule\Core\Helper;
use ModulesGarden\tssmodule\Core\ModuleConstants;

class MenuProviderConfig implements MenuProviderInterface
{
    public function getMenuItems(): array
    {
        $isAdmin = Helper\isAdmin();
        $file    = ($isAdmin) ? 'admin.yml' : 'client.yml';

        $menu = Reader::read(ModuleConstants::getDevConfigDir() . DIRECTORY_SEPARATOR . 'menu' . DIRECTORY_SEPARATOR . $file)->get();

        array_walk($menu, function(&$value) {
            $value = $value ?: [];
        });

        return $menu;
    }
}
