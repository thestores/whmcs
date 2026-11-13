<?php

namespace ModulesGarden\tssmodule\Core\UI;

use ModulesGarden\tssmodule\Components\AppNavBar\Breadcrumb;
use ModulesGarden\tssmodule\Components\OverlayComponents\OverlayComponents;
use ModulesGarden\tssmodule\Core\Helper\BuildUrl;
use ModulesGarden\tssmodule\Core\Helper\RandomStringGenerator;
use ModulesGarden\tssmodule\Core\ModuleConstants;
use ModulesGarden\tssmodule\Core\UI\View\AlertsBuilder;
use ModulesGarden\tssmodule\Core\UI\View\BreadcrumbsBuilder;
use ModulesGarden\tssmodule\Core\UI\View\NavBarBuilder;
use function ModulesGarden\tssmodule\Core\Helper\isAdmin;

/**
 *
 */
class View extends AbstractPartialView
{
    public function __construct()
    {
        $this->initDefaultComponents();
    }

    protected function initDefaultComponents()
    {
        $this->addElement(OverlayComponents::class);
    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->buildRootElements($this->elements);
    }
}
