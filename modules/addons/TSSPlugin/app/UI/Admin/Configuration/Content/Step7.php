<?php

namespace ModulesGarden\TSSPlugin\App\UI\Admin\Configuration\Content;

use ModulesGarden\TSSPlugin\App\UI\Admin\Configuration\Shared\WizardLayout;
use ModulesGarden\TSSPlugin\App\UI\Admin\Migration\Index\MigrationContainer;
use ModulesGarden\TSSPlugin\Components\Widget\Widget;
use ModulesGarden\TSSPlugin\Core\Translation\TranslatorTrait;

/**
 * Wizard step "Migration" (page 7, between products and finalization; only when "migrate" was chosen in step 3).
 * The same content as the Migration page - summary, the choices for products without a gateway match, start and
 * progress - in wizard mode: the start comes back here, and the wizard goes on once the run has completed.
 */
class Step7 extends Widget
{
    use TranslatorTrait;

    public function loadHtml(): void
    {
        WizardLayout::prepareStep($this, 7, $this->translate('step7_title'));

        $migration = new MigrationContainer();
        $migration->setWizardMode(true);
        $this->addElement($migration);
    }
}
