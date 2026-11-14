<?php

namespace ModulesGarden\TSSPlugin\Core\UI;

use ModulesGarden\TSSPlugin\Components\AppNavBar\Breadcrumb;
use ModulesGarden\TSSPlugin\Components\OverlayComponents\OverlayComponents;
use ModulesGarden\TSSPlugin\Core\Helper\BuildUrl;
use ModulesGarden\TSSPlugin\Core\Helper\RandomStringGenerator;
use ModulesGarden\TSSPlugin\Core\ModuleConstants;
use ModulesGarden\TSSPlugin\Core\UI\View\AlertsBuilder;
use ModulesGarden\TSSPlugin\Core\UI\View\BreadcrumbsBuilder;
use ModulesGarden\TSSPlugin\Core\UI\View\NavBarBuilder;
use function ModulesGarden\TSSPlugin\Core\Helper\isAdmin;

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
