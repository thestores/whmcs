<?php

namespace ModulesGarden\tssmodule\Core\Services;

use ModulesGarden\tssmodule\Core\ModuleConstants;
use ModulesGarden\tssmodule\Core\Routing\Url;
use ModulesGarden\tssmodule\Core\Support\Facades\Translator;
use ModulesGarden\tssmodule\Core\UI\Breadcrumbs\Item;
use ModulesGarden\tssmodule\Core\Support\Facades\Request;

class Breadcrumbs extends \ModulesGarden\tssmodule\Core\UI\Breadcrumbs\Breadcrumbs
{
    public function __construct()
    {
        $this->addDefault();
    }

    protected function addDefault()
    {
        $route = \ModulesGarden\tssmodule\Core\Support\Facades\Router::getCurrentRoute();
        if (!$route)
        {
            return;
        }

        $level = ModuleConstants::getLevel();
        $this->add(new Item(Translator::get($level . '.breadcrumbs.' . $route->getName()), Url::route($route->getName())));

        if ($route->getAction() && $route->getAction() != ModuleConstants::DEFAULT_CONTROLLER_ACTION)
        {
            $this->add(new Item(Translator::get($level . '.breadcrumbs.' . $route->getName() . '_' . $route->getAction()), Url::route($route->getName() . '@' . $route->getAction(), Request::query()->all())));
        }
    }
}
