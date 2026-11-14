<?php

namespace ModulesGarden\TSSPlugin\App\UI\Admin\Configuration\Shared\Forms;

use ModulesGarden\TSSPlugin\App\UI\Admin\Configuration\Shared\Providers\FinalizeProvider;
use ModulesGarden\TSSPlugin\Components\Button\ButtonSuccess;
use ModulesGarden\TSSPlugin\Components\Form\Form;
use ModulesGarden\TSSPlugin\Core\Components\Actions\FormSubmit;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\TSSPlugin\Components\Toolbar\Toolbar;


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