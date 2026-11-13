<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\ComplexElements\Tabs;

use ModulesGarden\tssmodule\Components\Badge\BadgeDanger;
use ModulesGarden\tssmodule\Components\Badge\BadgeInfo;
use ModulesGarden\tssmodule\Components\Badge\BadgeSuccess;
use ModulesGarden\tssmodule\Components\Badge\BadgeWarning;
use ModulesGarden\tssmodule\Components\Toolbar\Toolbar;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxOnLoadInterface;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\ComplexElements\Tabs\Tabs\Tab;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\Home\SimpleForm\Forms\SimpleAbstractForm;

class Tabs extends \ModulesGarden\tssmodule\Components\TabsWidget\TabsWidget implements AdminAreaInterface, AjaxOnLoadInterface
{
    public function loadData(): void
    {
        $tab2 = new \ModulesGarden\tssmodule\Components\Tab\Tab();
        $tab2->setTitle('YYYYYYYY');
        $tab2->setContent('2QWWQWQWQWWWQW3');

        $customTab = new Tab();
        $customTab->setId('dupa-123');

        $this->addTab($tab2);
        $this->addTab($customTab);
    }

    public function loadHtml(): void
    {
        $tab = new \ModulesGarden\tssmodule\Components\Tab\Tab();
        $tab->addElement($this->form());
        $tab->setTitle('Form');
        $this->addTab($tab);

        $tab = new \ModulesGarden\tssmodule\Components\Tab\Tab();
        $tab->addElement($this->badges());
        $tab->setTitle('Badges');
        $this->addTab($tab);

        for ($i = 0; $i < 20; $i++)
        {
            $tab = new \ModulesGarden\tssmodule\Components\Tab\Tab();
            $tab->setTitle($i);
            $tab->setContent($i);
            $this->addTab($tab);
        }
    }

    protected function form()
    {
        return new SimpleAbstractForm();
    }

    protected function badges()
    {
        $bar = new Toolbar();

        $bar->addElement((new BadgeDanger())->setText('1'));
        $bar->addElement((new BadgeSuccess())->setText('2'));
        $bar->addElement((new BadgeWarning())->setText('3'));
        $bar->addElement((new BadgeInfo())->setText('4'));

        return $bar;
    }
}
