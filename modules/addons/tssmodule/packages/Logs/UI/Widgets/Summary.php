<?php

namespace ModulesGarden\tssmodule\Packages\Logs\UI\Widgets;

use ModulesGarden\tssmodule\Components\Button\ButtonBasic;
use ModulesGarden\tssmodule\Components\Card\CardButton;
use ModulesGarden\tssmodule\App\Libs\GeneralSettings;
use ModulesGarden\tssmodule\App\Libs\Icons;
use ModulesGarden\tssmodule\App\Libs\LogPolicy;
use ModulesGarden\tssmodule\Components\Container\Container;
use ModulesGarden\tssmodule\Components\Text\Text;
use ModulesGarden\tssmodule\Components\Grid\Grid;
use ModulesGarden\tssmodule\Core\Components\Actions\ReloadById;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Support\Facades\Config;
use ModulesGarden\tssmodule\Packages\Logs\Enums\Status;
use ModulesGarden\tssmodule\Packages\Logs\Models\Job;
use ModulesGarden\tssmodule\Packages\Logs\Models\Logs;
use WHMCS\Database\Capsule as DB;

class Summary extends Container implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $banner = $this->debugBanner();
        if($banner !== '')
        {
            $notice = new Text();
            $notice->setCss('tss-html');
            $notice->setText($banner);
            $this->addElement($notice);
        }

        if(!GeneralSettings::enabled('hideInfoMessages'))
        {
            $intro = new Text();
            $intro->setCss('tss-html');
            $intro->setText($this->explanation());
            $this->addElement($intro);
        }

        //build per typy widgets
        $all      = Logs::select(DB::raw('\'total\' as type'), DB::raw('count(id) as count'));
        $types    = Logs::select('type', DB::raw('count(id) as count'))->union($all)->groupBy('type')->get();
        $elements = [];

        foreach ($types as $type)
        {
            $elements[] = [
                $this->buildCard(
                    $type->count,
                    $type->type,
                )];
        }

        $grid = new Grid();
        $grid->setRows([$elements]);
        $this->addElement($grid);
    }

    /** Shown while a service is in debug mode, so nobody forgets it is on */
    protected function debugBanner(): string
    {
        $services = LogPolicy::debugServices();
        if(!$services)
        {
            return '';
        }

        $until = LogPolicy::debugUntil();
        $token = function_exists('generate_token') ? \generate_token('plain') : '';
        $stop  = 'addonmodules.php?module=tssmodule&mg-page=logs&mg-action=stopDebug&token=' . urlencode($token);

        return '<div class="tss-note is-bad"><b>' . htmlspecialchars((string)$this->translate('debugTitle')) . '</b> '
            . htmlspecialchars((string)$this->translate('debugText', [
                'services' => '#' . implode(', #', $services),
                'until'    => date(date('Y-m-d', $until) === date('Y-m-d') ? 'H:i' : 'Y-m-d H:i', $until),
            ]))
            . ' <a href="' . htmlspecialchars($stop) . '">' . htmlspecialchars((string)$this->translate('debugStop')) . '</a></div>';
    }

    protected function explanation(): string
    {
        $t    = function($key) { return htmlspecialchars((string)$this->translate($key), ENT_QUOTES); };
        $item = function($key) use ($t) { return '<li>' . $t($key) . '</li>'; };

        return '<div class="tss-explain"><span class="tss-explain__icon">' . Icons::svg('information-outline') . '</span><div>'
            . '<h3>' . $t('aboutTitle') . '</h3>'
            . '<p>' . $t('aboutIntro') . '</p>'
            . '<ul>' . $item('aboutApi') . $item('aboutError') . $item('aboutDetails') . $item('aboutRelated') . $item('aboutLevels') . $item('aboutSettings') . '</ul>'
            . '</div></div>';
    }

    protected function buildCard(int $count, $type)
    {
        $button = new (Config::get('install.logs.colors.' . $type . '.button', ButtonBasic::class));
        $button->setTitle($this->translate('show'));
        $button->onClick((new ReloadById("LogsDataTable"))->withParams([
            "filters" => $type != 'total' ? ['type' => $type] : []
        ]));


        $card = new CardButton();
        $card->setButton($button);
        $card->setIcon(Config::get('install.logs.colors.' . $type . '.icon', ''));
        $card->setTitle($this->translate($type . 'Title'));
        $card->setContent($count);

        if(in_array($type, ['info', 'error', 'total', 'warning', 'debug'], true))
        {
            $note = new Text();
            $note->setCss('tss-html tss-cardnote');
            $note->setText('<small>' . htmlspecialchars((string)$this->translate($type . 'Note'), ENT_QUOTES) . '</small>');
            $card->addElement($note);
        }

        return $card;
    }
}