<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\CopyToTarget\Forms;

use ModulesGarden\tssmodule\Components\Container\Container;
use ModulesGarden\tssmodule\Components\CopyTextInline\CopyTextInline;
use ModulesGarden\tssmodule\Components\Form\Builder\BuilderCreator;
use ModulesGarden\tssmodule\Components\Form\Form;
use ModulesGarden\tssmodule\Components\FormInputText\FormInputText;
use ModulesGarden\tssmodule\Components\Label\Label;
use ModulesGarden\tssmodule\Components\ListSimple\ListSimple;
use ModulesGarden\tssmodule\Components\Text\Text;
use ModulesGarden\tssmodule\Components\TextArea\TextArea;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;

class BaseForm extends Form implements AjaxComponentInterface, AdminAreaInterface
{
    public function __construct()
    {
        parent::__construct();

        $this->builder = BuilderCreator::oneColumnHalfPage($this);
    }

    public function loadHtml(): void
    {
        $textInput = $this->builder->createField(FormInputText::class, 'subject');
        $targetArea = $this->builder->createField(TextArea::class, 'contentTextArea');

        $listSimple1 = new ListSimple();

        $buttons = [
            '{$client_firstname}',
            '{$client_lastname}',
            '{$client_company}'
        ];

        $label1 = new Label();
        $label1->setText("Kopiuje tylko do Subjectu");

        $this->builder->addElement($label1);

        foreach ($buttons as $button)
        {
            $copyComponent = new CopyTextInline();
            $copyComponent->setName('copy');
            $copyComponent->setText($button);
            $copyComponent->setTargetComponent($textInput);
            $copyComponent->hideIcon();
            $listSimple1->addElement($copyComponent);
        }

        $this->builder->addElement($listSimple1);

        $label2 = new Label();
        $label2->setText("Kopiuje tylko do Contentu (textarea)");

        $this->builder->addElement($label2);

        $listSimple2 = new ListSimple();

        foreach ($buttons as $button)
        {
            $copyComponent = new CopyTextInline();
            $copyComponent->setName('copy');
            $copyComponent->setText($button);
            $copyComponent->setTargetComponentName('contentTextArea');
            $copyComponent->hideIcon();
            $listSimple2->addElement($copyComponent);
        }

        $this->builder->addElement($listSimple2);

        $label3 = new Label();
        $label3->setText("Kopiuje gdziekolwiek jest kursor");

        $this->builder->addElement($label3);

        $listSimple3 = new ListSimple();

        foreach ($buttons as $button)
        {
            $copyComponent = new CopyTextInline();
            $copyComponent->setName('copy');
            $copyComponent->setText($button);
            $copyComponent->setTargetFocused();
            $copyComponent->hideIcon();
            $listSimple3->addElement($copyComponent);
        }

        $this->builder->addElement($listSimple3);
    }
}