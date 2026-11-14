<?php

namespace ModulesGarden\TSSPlugin\App\UI\Admin\AutomationQueue\Index;

use ModulesGarden\TSSPlugin\App\UI\Admin\AutomationQueue\Index\DataTables\Queue\DataTable;
use ModulesGarden\TSSPlugin\App\Libs\Icons;
use ModulesGarden\TSSPlugin\Components\Container\Container;
use ModulesGarden\TSSPlugin\Components\Text\Text;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;

class AutomationQueueContainer extends Container implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        if(!\ModulesGarden\TSSPlugin\App\Libs\GeneralSettings::enabled('hideInfoMessages'))
        {
            $text = new Text();
            $text->setCss('tss-html');
            $text->setText($this->explanation());
            $this->addElement($text);
        }

        $this->addElement(new DataTable());
    }

    protected function explanation(): string
    {
        $t    = function($key) { return htmlspecialchars((string)$this->translate($key), ENT_QUOTES); };
        $item = function($key) use ($t) { return '<li>' . $t($key) . '</li>'; };

        return '<div class="tss-explain"><span class="tss-explain__icon">' . Icons::svg('information-outline') . '</span><div>'
            . '<h3>' . $t('about_title') . '</h3>'
            . '<p>' . $t('about_intro') . '</p>'
            . '<ul>' . $item('about_validate') . $item('about_install') . $item('about_reissue') . $item('about_status') . $item('about_error') . '</ul>'
            . '</div></div>';
    }
}
