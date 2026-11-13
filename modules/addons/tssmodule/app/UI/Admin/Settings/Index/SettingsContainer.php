<?php

namespace ModulesGarden\tssmodule\App\UI\Admin\Settings\Index;

use ModulesGarden\tssmodule\App\UI\Admin\Settings\Index\Widgets\ApiSettingsWidget;
use ModulesGarden\tssmodule\App\UI\Admin\Settings\Index\Widgets\AutomatedSettingsWidget;
use ModulesGarden\tssmodule\App\UI\Admin\Settings\Index\Widgets\CronSettingsWidget;
use ModulesGarden\tssmodule\App\UI\Admin\Settings\Index\Widgets\FinanceSettingsWidget;
use ModulesGarden\tssmodule\App\UI\Admin\Settings\Index\Widgets\GeneralSettingsWidget;
use ModulesGarden\tssmodule\App\UI\Admin\Settings\Index\Widgets\LogsSettingsWidget;
use ModulesGarden\tssmodule\App\UI\Admin\Settings\Index\Widgets\Sidebar;
use ModulesGarden\tssmodule\App\UI\Admin\Settings\Index\Widgets\SslSettingsWidget;
use ModulesGarden\tssmodule\Components\Container\Container;
use ModulesGarden\tssmodule\Components\Grid\Grid;
use ModulesGarden\tssmodule\Components\Tab\Tab;
use ModulesGarden\tssmodule\Components\TabsWidget\TabsWidget;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Support\Facades\Request;

class SettingsContainer extends Container implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        // skin of the settings pages (resources/assets/css/shell.css)
        $this->setCss('tss-settings');

        if(Request::get('settings-page') == 'apiSettings')
        {
            $mainWidget = new ApiSettingsWidget();
        }
        elseif(Request::get('settings-page') == 'sslSettings')
        {
            $mainWidget = new SslSettingsWidget();
        }
        elseif(Request::get('settings-page') == 'automatedSettings')
        {
            $mainWidget = new AutomatedSettingsWidget();
        }
        elseif(Request::get('settings-page') == 'financeSettings')
        {
            $mainWidget = new FinanceSettingsWidget();
        }
        elseif(Request::get('settings-page') == 'cronSettings')
        {
            $mainWidget = new CronSettingsWidget();
        }
        elseif(Request::get('settings-page') == 'logsSettings')
        {
            $mainWidget = new LogsSettingsWidget();
        }
        elseif(Request::get('settings-page') == 'generalSettings')
        {
            $mainWidget = new GeneralSettingsWidget();
        }
        else
        {
            $mainWidget = new ApiSettingsWidget();
        }

        $grid = new Grid();
        $grid->setRows(
            [
                [
                      [new Sidebar(), 2]   ,[$mainWidget,10]
                ]

            ]
        );

        $this->addElement($grid);


    }
}
