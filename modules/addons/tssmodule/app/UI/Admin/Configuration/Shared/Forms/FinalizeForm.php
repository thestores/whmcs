<?php

namespace ModulesGarden\tssmodule\App\UI\Admin\Configuration\Shared\Forms;

use ModulesGarden\tssmodule\App\UI\Admin\Configuration\Shared\Providers\FinalizeProvider;
use ModulesGarden\tssmodule\Components\Button\ButtonSuccess;
use ModulesGarden\tssmodule\Components\Form\Form;
use ModulesGarden\tssmodule\Core\Components\Actions\FormSubmit;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\tssmodule\Components\Toolbar\Toolbar;


class FinalizeForm extends Form implements AdminAreaInterface, AjaxComponentInterface
{
    public function __construct()
    {
        parent::__construct();

        $this->provider       = FinalizeProvider::class;
        $this->providerAction = FinalizeProvider::ACTION_UPDATE;
    }

    public function loadHtml(): void
    {
        $toolbar = new Toolbar();
        $toolbar->addElement(
            (new ButtonSuccess())
                ->setId('buttonSave')
                ->setTitle($this->translate('finalize'))
                ->onClick(new FormSubmit($this))
        );
        $this->addElement($toolbar);
    }
}