<?php

namespace ModulesGarden\TSSPlugin\Core\Services;

use ModulesGarden\TSSPlugin\Core\ModuleConstants;
use ModulesGarden\TSSPlugin\Core\Routing\Url;
use ModulesGarden\TSSPlugin\Core\Support\Facades\Translator;
use ModulesGarden\TSSPlugin\Core\UI\Breadcrumbs\Item;
use ModulesGarden\TSSPlugin\Core\Support\Facades\Request;

class Breadcrumbs extends \ModulesGarden\TSSPlugin\Core\UI\Breadcrumbs\Breadcrumbs
{
    public function __construct()
    {
        $this->addDefault();
    }

    protected function addDefault()
    {
        $route = \ModulesGarden\TSSPlugin\Core\Support\Facades\Router::getCurrentRoute();
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
