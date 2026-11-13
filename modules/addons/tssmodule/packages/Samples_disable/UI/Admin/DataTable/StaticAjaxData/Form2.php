<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\DataTable\StaticAjaxData;

use ModulesGarden\tssmodule\Components\Form\AbstractForm;
use ModulesGarden\tssmodule\Components\PreBlock\PreBlock;
use ModulesGarden\tssmodule\Core\Components\Actions\PassAjaxData;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;

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