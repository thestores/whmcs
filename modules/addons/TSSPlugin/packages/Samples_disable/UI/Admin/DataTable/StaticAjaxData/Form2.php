<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\DataTable\StaticAjaxData;

use ModulesGarden\TSSPlugin\Components\Form\AbstractForm;
use ModulesGarden\TSSPlugin\Components\PreBlock\PreBlock;
use ModulesGarden\TSSPlugin\Core\Components\Actions\PassAjaxData;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxComponentInterface;

class Form2 extends AbstractForm implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $this->onSubmit((new PassAjaxData((new DataTable())->getId())));
    }

    public function loadData(): void
    {
        $pre = new PreBlock();
        $pre->setContent(print_r($_REQUEST, true));
        $this->addElement($pre);
    }
}