<?php

namespace ModulesGarden\tssmodule\Core\UI\View;

use ModulesGarden\tssmodule\Components\AppBreadcrumb\AppBreadcrumb;
use ModulesGarden\tssmodule\Core\Support\Facades\Breadcrumbs;

class BreadcrumbsBuilder
{
    public function create(): AppBreadcrumb
    {
        $breadcrumb = new AppBreadcrumb();
        $breadcrumb->setItems(Breadcrumbs::get());

        return $breadcrumb;
    }
}