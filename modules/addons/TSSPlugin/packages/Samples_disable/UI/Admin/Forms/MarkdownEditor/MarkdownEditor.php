<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\Forms\MarkdownEditor;

use ModulesGarden\TSSPlugin\Components\Button\ButtonSubmitSuccess;
use ModulesGarden\TSSPlugin\Components\Widget\Widget;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxComponentInterface;

class MarkdownEditor extends \ModulesGarden\TSSPlugin\Components\Form\Form implements AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $widget = new Widget();
        $widget->setTitle('Markdown Editor');
        $this->addElement($widget);

        $this->builder->setDefaultContainer($widget);

        $markdown = new \ModulesGarden\TSSPlugin\Components\MarkdownEditor\MarkdownEditor();
        $markdown->setName('markdown');
        $this->builder->addElement($markdown);

        $this->builder->addElement(new ButtonSubmitSuccess());
    }
}