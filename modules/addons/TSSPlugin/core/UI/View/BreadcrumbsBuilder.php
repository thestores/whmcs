<?php

namespace ModulesGarden\TSSPlugin\Core\UI\View;

use ModulesGarden\TSSPlugin\Components\AppBreadcrumb\AppBreadcrumb;
use ModulesGarden\TSSPlugin\Core\Support\Facades\Breadcrumbs;

class BreadcrumbsBuilder
{
    public function create(): AppBreadcrumb
    {
        $breadcrumb = new AppBreadcrumb();
        $breadcrumb->setItems(Breadcrumbs::get());

        return $breadcrumb;
    }
}