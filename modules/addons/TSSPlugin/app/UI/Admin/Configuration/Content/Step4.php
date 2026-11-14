<?php

namespace ModulesGarden\TSSPlugin\App\UI\Admin\Configuration\Content;

use ModulesGarden\TSSPlugin\App\Migration\Credentials;
use ModulesGarden\TSSPlugin\App\UI\Admin\Configuration\Shared\WizardLayout;
use ModulesGarden\TSSPlugin\App\UI\Admin\Settings\Index\Forms\ApiSettingsForm;
use ModulesGarden\TSSPlugin\Components\Text\Text;
use ModulesGarden\TSSPlugin\Components\Button\ButtonSuccess;
use ModulesGarden\TSSPlugin\Components\Widget\Widget;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\TSSPlugin\Core\Components\Action;
use ModulesGarden\TSSPlugin\Core\Translation\TranslatorTrait;

class Step4 extends Widget implements AjaxComponentInterface
{
    use TranslatorTrait;

    public function loadHtml(): void
    {
        WizardLayout::prepareStep($this, 4, $this->translate('step4_title'));

        [, $filled] = Credentials::prefilled();
        if($filled)
        {
            $names = array_map(function($s) { return $s === 'ggs' ? 'GoGetSSL' : 'TheSSLStore'; }, $filled);
            $note  = new Text();
            $note->setCss('tss-html');
            $note->setText('<div class="tss-note is-ok">' . htmlspecialchars($this->translate('credentials_prefilled', ['modules' => implode(', ', $names)])) . '</div>');
            $this->addElement($note);
        }

        $this->addElement(new ApiSettingsForm(true));

    }
}