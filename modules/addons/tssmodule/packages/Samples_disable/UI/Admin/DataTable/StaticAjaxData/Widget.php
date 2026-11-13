<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\DataTable\StaticAjaxData;

use ModulesGarden\tssmodule\Components\Button\ButtonSubmitSuccess;
use ModulesGarden\tssmodule\Core\Components\Actions\FormSubmit;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;

class Widget extends \ModulesGarden\tssmodule\Components\Widget\Widget implements AjaxComponentInterface, AdminAreaInterface
{
    protected string $cid = 'container-xxxx';

    public function loadHtml(): void
    {
        $form = new Form2();

        $this->addElementToToolbar($this->addElement((new ButtonSubmitSuccess())->onClick(new FormSubmit($form))));
        $this->addElement($form);
    }
}