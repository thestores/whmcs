<?php

namespace ModulesGarden\tssmodule\App\UI\Admin\Configuration\Content;

use ModulesGarden\tssmodule\Components\Button\ButtonSuccess;
use ModulesGarden\tssmodule\Components\Row\Row;
use ModulesGarden\tssmodule\Components\Text\Text;
use ModulesGarden\tssmodule\Components\Widget\Widget;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\tssmodule\Core\Components\Action;
use ModulesGarden\tssmodule\Core\Translation\TranslatorTrait;

class Step1 extends Widget implements AjaxComponentInterface
{

    use TranslatorTrait;

    public function loadHtml(): void
    {
        \ModulesGarden\tssmodule\App\UI\Admin\Configuration\Shared\WizardLayout::prepareStep($this, 1, $this->translate('step1_title'));

        $text = new Text();
        $text->setText($this->translate('first_p', ['moduleName' => \ModulesGarden\tssmodule\App\Libs\Edition::name()]).'<br><br>');
        $this->addElement($text);

        $row = new Row();
        $this->addElement($row);

        $text = new Text();
        $text->setText($this->translate('second_p').'<br><br>');
        $this->addElement($text);

        $features = '';
        foreach([1, 2, 3] as $i)
        {
            $features .= '<div class="tss-feature"><div class="tss-feature__title">' . htmlspecialchars($this->translate('feature' . $i . '_title')) . '</div>'
                . '<div class="tss-feature__desc">' . htmlspecialchars($this->translate('feature' . $i . '_desc')) . '</div></div>';
        }
        $text = new Text();
        $text->setCss('tss-html');
        $text->setText('<div class="tss-features">' . $features . '</div>');
        $this->addElement($text);

        $row = new Row();
        $this->addElement($row);

        $text = new Text();
        $text->setText($this->translate('third_p'));
        $this->addElement($text);

        $row = new Row();
        $this->addElement($row);

        $nextStep = new ButtonSuccess();
        $nextStep->setCss('lu-btn lu-btn--success mt30_custom');
        $nextStep->onClick(Action::redirect('addonmodules.php?module=tssmodule&mg-page=configuration&mg-action=step2'));
        $nextStep->setTitle($this->translate('next_step_btn'));
        $this->addElement($nextStep);


    }
}