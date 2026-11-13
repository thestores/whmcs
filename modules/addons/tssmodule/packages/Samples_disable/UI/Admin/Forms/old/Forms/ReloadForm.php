<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\ComplexElements\Forms;

use ModulesGarden\tssmodule\Components\Button\Button;
use ModulesGarden\tssmodule\Components\Dropdown\Dropdown;
use ModulesGarden\tssmodule\Components\FormInputText\FormInputText;
use ModulesGarden\tssmodule\Components\Switcher\Switcher;
use ModulesGarden\tssmodule\Core\Components\Actions\PopulateValue;
use ModulesGarden\tssmodule\Core\Components\Actions\Reload;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;

class ReloadForm extends \ModulesGarden\tssmodule\Components\Form\Form implements AjaxComponentInterface
{
    protected string $provider = \ModulesGarden\tssmodule\Packages\Samples\UI\Admin\ComplexElements\Providers\ReloadForm::class;

    public function reload()
    {
        $this->loadHtml();

        $this->addDropdown('drop2');
    }

    public function loadHtml(): void
    {
        $this->addDropdown('drop1');
        $this->addInputText();
        $this->addSwitcher();
        $this->addButton();
    }

    protected function addDropdown($name)
    {
        $dropdown = new Dropdown();
        $dropdown->setName($name);
        $dropdown->setOptions([
            '1' => '1',
            '2' => '2',
            '3' => '3',
        ]);
        $dropdown->onChange(new Reload($this));
        $dropdown->setDefaultValueAsFirstOption();

        $this->builder->addField($dropdown);
    }

    protected function addInputText()
    {
        $text = new FormInputText();
        $text->setName('dwa');

        $text2 = new FormInputText();
        $text2->onChange(new PopulateValue([$text->getName()]));

        $this->builder->addField($text);
        $this->builder->addField($text2);
    }

    protected function addSwitcher()
    {
        $swicher = new Switcher();
        $swicher->onChange(new Reload($this));

        $this->builder->addField($swicher);
    }

    protected function addButton()
    {
        $swicher = new Button();
        $swicher->onClick(new Reload($this));

        $this->builder->addField($swicher);
    }
}