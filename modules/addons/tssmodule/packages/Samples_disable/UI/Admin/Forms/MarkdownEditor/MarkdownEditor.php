<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\Forms\MarkdownEditor;

use ModulesGarden\tssmodule\Components\Button\ButtonSubmitSuccess;
use ModulesGarden\tssmodule\Components\Widget\Widget;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;

class MarkdownEditor extends \ModulesGarden\tssmodule\Components\Form\Form implements AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $widget = new Widget();
        $widget->setTitle('Markdown Editor');
        $this->addElement($widget);

        $this->builder->setDefaultContainer($widget);

        $markdown = new \ModulesGarden\tssmodule\Components\MarkdownEditor\MarkdownEditor();
        $markdown->setName('markdown');
        $this->builder->addElement($markdown);

        $this->builder->addElement(new ButtonSubmitSuccess());
    }
}