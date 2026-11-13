<?php

namespace ModulesGarden\tssmodule\App\UI\Admin\Configuration\Shared\Forms;

use ModulesGarden\tssmodule\App\Migration\Detector;
use ModulesGarden\tssmodule\App\UI\Admin\Configuration\Shared\Providers\LegacyChoiceProvider;
use ModulesGarden\tssmodule\Components\Button\ButtonSuccess;
use ModulesGarden\tssmodule\Components\Dropdown\Dropdown;
use ModulesGarden\tssmodule\Components\Form\Builder\BuilderCreator;
use ModulesGarden\tssmodule\Components\Form\Form;
use ModulesGarden\tssmodule\Components\Toolbar\Toolbar;
use ModulesGarden\tssmodule\Core\Components\Actions\FormSubmit;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;

/**
 * Wizard step 3: one choice per detected legacy module (migrate / install standalone)
 */
class LegacyChoiceForm extends Form implements AdminAreaInterface, AjaxComponentInterface
{
    public function __construct()
    {
        parent::__construct();

        $this->provider       = LegacyChoiceProvider::class;
        $this->providerAction = LegacyChoiceProvider::ACTION_UPDATE;
    }

    public function loadHtml(): void
    {
        $this->builder = BuilderCreator::oneColumn($this);
        $this->setId('LegacyChoiceForm');

        foreach(array_keys(Detector::detect()) as $source)
        {
            $this->builder->addField((new Dropdown())->setName('choice_' . $source), true);
        }

        $toolbar = new Toolbar();
        $toolbar->addElement(
            (new ButtonSuccess())
                ->setId('buttonSave')
                ->setTitle($this->translate('next_step_btn'))
                ->onClick(new FormSubmit($this))
        );
        $this->addElement($toolbar);
    }
}
