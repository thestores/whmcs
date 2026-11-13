<?php

namespace ModulesGarden\tssmodule\App\UI\Admin\AutomationQueue\Index;

use ModulesGarden\tssmodule\App\UI\Admin\AutomationQueue\Index\DataTables\Queue\DataTable;
use ModulesGarden\tssmodule\App\Libs\Icons;
use ModulesGarden\tssmodule\Components\Container\Container;
use ModulesGarden\tssmodule\Components\Text\Text;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;

class AutomationQueueContainer extends Container implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        if(!\ModulesGarden\tssmodule\App\Libs\GeneralSettings::enabled('hideInfoMessages'))
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
