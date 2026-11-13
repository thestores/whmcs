<?php

namespace ModulesGarden\tssmodule\App\UI\Admin\Configuration\Content;

use ModulesGarden\tssmodule\Components\Alert\AlertInfo;
use ModulesGarden\tssmodule\Components\Button\ButtonSuccess;
use ModulesGarden\tssmodule\Components\Widget\Widget;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\tssmodule\Core\Components\Action;
use ModulesGarden\tssmodule\Core\Translation\TranslatorTrait;
use ModulesGarden\tssmodule\App\UI\Admin\Products\Index\DataTables\Products\ArrayDataProvider\DataTable;

class Step5 extends Widget implements AjaxComponentInterface
{
    use TranslatorTrait;

    public function loadHtml(): void
    {
        \ModulesGarden\tssmodule\App\UI\Admin\Configuration\Shared\WizardLayout::prepareStep($this, 5, $this->translate('step5_title'));

        $alert = new AlertInfo();
        $alert->setText($this->translate("productsInfo"));
        $this->addElement($alert);

        $this->addElement(new DataTable());

        $nextStep = new ButtonSuccess();
        $nextStep->setCss('lu-btn lu-btn--success mt30_custom');
        $nextStep->onClick(Action::redirect('addonmodules.php?module=tssmodule&mg-page=configuration&mg-action=step6'));
        $nextStep->setTitle($this->translate('next_step_btn'));
        $this->addElement($nextStep);
    }
}