<?php

namespace ModulesGarden\TSSPlugin\App\UI\Admin\Settings\Index\Widgets;

use ModulesGarden\TSSPlugin\App\Libs\Icons;
use ModulesGarden\TSSPlugin\App\UI\Admin\Settings\Index\Forms\CronConfigurationForm;
use ModulesGarden\TSSPlugin\Components\Text\Text;
use ModulesGarden\TSSPlugin\Components\Widget\Widget;

/**
 * CRON settings: ONE cron line for the whole module (RunAll starts every job when it is due), then the form with one
 * card per job (description, status, how often it runs).
 */
class CronSettingsWidget extends Widget
{
    public function loadHtml(): void
    {
        $this->setTitle($this->translate('title'));
        $this->setIcon('file-clock-outline');
        $this->setSubtitle($this->translate('subtitle'));
        $this->setCss('tss-cronpanel');

        $script = dirname(__DIR__, 6) . '/cron/cron.php';
        $line   = '*/5 * * * * php -q ' . $script . ' RunAll';
        $copied = addslashes($this->translate('copied'));
        $copy   = addslashes($this->translate('copy'));

        $this->addElement((new Text())->setText(
            '<div class="tss-cronone"><div class="tss-cronone__title">' . Icons::svg('console') . '' . $this->translate('oneLineTitle') . '</div>'
            . '<p>' . $this->translate('oneLineInfo') . '</p>'
            . '<div class="tss-cronone__code"><code>' . htmlspecialchars($line) . '</code>'
            . '<button type="button" class="tss-copy" onclick="var b=this,o=b.innerHTML;navigator.clipboard.writeText(b.previousElementSibling.textContent);b.textContent=\'' . $copied
            . '\';setTimeout(function(){b.innerHTML=o},1500)">' . Icons::svg('content-copy') . '' . $this->translate('copy') . '</button></div></div>'
        ));

        $this->addElement(new CronConfigurationForm());
    }
}
